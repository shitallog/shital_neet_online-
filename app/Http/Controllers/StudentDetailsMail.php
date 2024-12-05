<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Qution;
use App\Models\Quiz;
use App\Models\student;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Mail;
use App\Mail\ExamDeclared; // Create this mailable
use Illuminate\Support\Facades\Notification;
use App\Notifications\ExamNotification; // Create this notification
use Barryvdh\DomPDF\Facade\Pdf; // Make sure this import is correct
use Illuminate\Http\Request;


class StudentDetailsMail extends Controller
{
  

    public function Qnsview($id)
{
    // Fetch quizzes with related subjects and questions for the specific exam_id
    // $quizzes = Quiz::with(['subject', 'questions']) // 'questions' is the relationship
    //                ->where('exam_id', $id)
    //                ->get(); // This will return a collection of quiz objects
    $quizzes = Quiz::where('exam_id', $id)->get();





    // Pass the quizzes to the view
    return view('Admin.Q&A.Qnsview', compact('quizzes', 'id'));
}


public function downloadQnsviewPdf($id)
    {
        // Fetch quizzes for the PDF based on exam_id
        $quizzes = Quiz::with(['subject', 'questions'])
                       ->where('exam_id', $id)
                       ->get();

        // Generate the PDF using a view
        $pdf = PDF::loadView('Admin.Q&A.Qnsview_pdf', compact('quizzes'));

// Get the raw PDF output as a string
       $pdfOutput = $pdf->output();

// Calculate the PDF size in bytes
        $pdfSizeInBytes = strlen($pdfOutput);

// Convert size to KB and MB
        $pdfSizeInKB = round($pdfSizeInBytes / 1024, 2); // Convert to KB
        $pdfSizeInMB = round($pdfSizeInKB / 1024, 2);    // Convert to MB

// Log or display the PDF size
       Log::info("PDF Size: $pdfSizeInBytes bytes ($pdfSizeInKB KB, $pdfSizeInMB MB)");


        // Return the generated PDF as a download
        return $pdf->download('questions_view.pdf');
    }


    public function Ansview($id)
    {
        // Fetch all quizzes with their questions and subjects
    
        //   $quizzes = Quiz::with(['subject', 'questions']) // 'questions' is the relationship
        //   ->where('exam_id', $id)
        //   ->get(); // This will return a collection of quiz objects
    
        $quizzes = Quiz::where('exam_id', $id)->get();
     
        // Pass both quizzes and questions to the view
        return view('Admin.Q&A.Ansview', compact( 'quizzes', 'id'));
    }


    public function downloadAnsviewPdf($id)
    {
        // Fetch the quizzes with related subjects and questions based on the provided exam_id
        $quizzes = Quiz::with(['subject', 'questions'])
                       ->where('exam_id', $id)
                       ->get(); // This will return a collection of quiz objects
    
        // Check if quizzes are found
        if ($quizzes->isEmpty()) {
            return redirect()->back()->with('error', 'No quizzes found for this exam.');
        }
    
        // Generate the PDF using a view
        $pdf = PDF::loadView('Admin.Q&A.Ansview_pdf', compact('quizzes'));
    
        // Return the generated PDF as a download
        return $pdf->download('answers_view.pdf');
    }




    public function studentPdf()
    {
        // Fetch all user data (assuming they represent students)
        $users = User::all();  // Fetching data from the User model
    
        // Data to pass to the view
        $data = [
            'title' => 'Student Q&A PDF',
            'content' => 'Here is the student Q&A content that will be in the PDF.',
            'users' => $users // Pass users variable to the view
        ];
    
        // Generate the PDF using a view
        $pdf = PDF::loadView('Admin.User.student-pdf', $data);
    
        // Download the PDF file
        return $pdf->download('student-detail.pdf');
    }
    

    public function update(Request $request, $id)
    {
    $question = Question::findOrFail($id); // Ensure you're using the correct primary key
    
        $request->validate([
            'question_text' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'question_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'option_a_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'option_b_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'option_c_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'option_d_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Update text fields
        $question->question_text = $request->question_text;
        $question->option_a = $request->option_a;
        $question->option_b = $request->option_b;
        $question->option_c = $request->option_c;
        $question->option_d = $request->option_d;
    
        // Handle image uploads
        if ($request->hasFile('question_image')) {
            $question->question_image = $request->file('question_image')->store('questions', 'public');
        }
    
        if ($request->hasFile('option_a_image')) {
            $question->option_a_image = $request->file('option_a_image')->store('options', 'public');
        }
    
        if ($request->hasFile('option_b_image')) {
            $question->option_b_image = $request->file('option_b_image')->store('options', 'public');
        }
    
        if ($request->hasFile('option_c_image')) {
            $question->option_c_image = $request->file('option_c_image')->store('options', 'public');
        }
    
        if ($request->hasFile('option_d_image')) {
            $question->option_d_image = $request->file('option_d_image')->store('options', 'public');
        }
    
        $question->save();
    
        return redirect()->route('Admin.Q&A.Qnsview')->with('success', 'Question updated successfully.');
    }
    

public function edit($id)
{
    $question = Question::where('id', $id)->firstOrFail();

    return view('Admin.Q&A.edit', compact('question'));
}

public function destroy($id)
{
    $question = Question::findOrFail($id); // Fetch the question by ID

    $question->delete(); // Delete the question

    return redirect()->route('Admin.Q&A.Qnsview')->with('success', 'Question deleted successfully.');
}


}
