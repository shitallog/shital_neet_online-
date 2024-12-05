<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;

use App\Models\Subject;
use App\Models\Qution;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Mail;
use App\Mail\ExamDeclared; // Create this mailable
use Illuminate\Support\Facades\Notification;
use App\Notifications\ExamNotification; // Create this notification
use Barryvdh\DomPDF\Facade\Pdf; // Make sure this import is correct
use App\PDFGenerate;



use Illuminate\Http\Request;

class QutionandAnsController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('questions', 'subject')->get();
        
        // Assuming you want to find the next question ID
        $nextQuestionsId = Question::max('id') + 1; // Or however you want to determine the next ID
    
        return view('Admin.Q&A.index', compact('quizzes', 'nextQuestionsId')); // Pass it to the view
    }
    



    public function create()
    {
        $subjects = Subject::all(); // Fetch all subjects for the select dropdown
        return view('Admin.Q&A.create', compact('subjects')); // Pass subjects to the view
    }

    /*
    public function activate($id)
    {
        $quiz = Quiz::findOrFail($id);
    
        // Toggle status between 0 and 1
        $quiz->status = $quiz->status == 1 ? 0 : 1;
        $quiz->save();
    
         // Send notifications only if the status is set to active (1)
         if ($quiz->status == 1) {
            // Send email notification to all students associated with the quiz
            foreach ($quiz->students as $student) {
                Mail::to($student->email)->send(new ExamDeclared($quiz));
            }

             // Send frontend notification (if using Laravel Echo or Pusher)
                Notification::send($quiz->students, new ExamNotification($quiz));
        }

             // Return back with success message
            return back()->with('success', 'Success Notifications Sent to Students.');
      
    }
*/
public function showQuestionPdf($id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('Admin.Q&A.question_pdf', compact('quiz'));
    }

public function downloadPdf()
    {
        // Fetch the quizzes, including questions, answers, and related data
        $quizzes = Quiz::with(['exam', 'subject', 'questions'])->get();

        // Load the view with data and generate the PDF
        $pdf = PDF::loadView('Admin.Q&A.question_pdf', compact('quizzes'));

        // Return the PDF as a download
        return $pdf->download('quiz_questions.pdf');
    }
//publish start




public function togglePublish(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);

        if ($request->has('publish')) {
            if ($request->publish == 'yes') {
                $quiz->exam_status = 'started';
                $quiz->publish = true;
            } else {
                $quiz->exam_status = 'not_started';
                $quiz->publish = false;
            }
        }

        $quiz->save();

        return redirect()->back()->with('status', 'Exam status updated!');
    }




    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'price' => 'required|numeric',
        ]);

        // Create the quiz with the subject_id provided in the request
        Quiz::create([
            'subject_id' => $request->subject_id,
            'price' => $request->price,
            'total' => 0, // Default value, adjust as needed
        ]);

        return redirect()->route('Admin.Q&A.index')->with('success', 'Quiz created successfully!');
    }
    

    public function edit($id)
    {
        $quiz = Quiz::with('questions')->findOrFail($id);
        $subjects = Subject::all(); // Fetch all subjects for the select dropdown
        return view('Admin.Q&A.edit', compact('quiz', 'subjects'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'price' => 'required|numeric',
        ]);

        $quiz = Quiz::findOrFail($id);
        $quiz->update([
            'subject_id' => $request->subject_id,
            'price' => $request->price,
            'total' => 0, // Default value
        ]);

        return redirect()->route('Admin.Q&A.createAdmin.Q&A.index')->with('success', 'Quiz updated successfully!');
    }

    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();

        return redirect()->route('Admin.Q&A.index')->with('success', 'Quiz deleted successfully!');
    }

   
    public function show($id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('quizzes.show', compact('quiz'));
    }

//      // QutionandAnsController.php
// public function Qnsview($id)
// {
//     // Fetch all quizzes with related questions and subjects for the given exam_id
//     $quizzes = Quiz::with('questions', 'subject')
//         ->where('exam_id', $id) // Filter by exam_id
//         ->get();
    
//     // Fetch all questions for the given exam_id and quiz_id, ordered by quiz_id
//     $questions = Question::where('exam_id', $id)  // Filter by exam_id
//         ->orderBy('quiz_id', 'asc')               // Order by quiz_id
//         ->get();
    
//     // Pass the quizzes and question data to the view
//     return view('Admin.Q&A.Qnsview', compact('questions', 'quizzes'));
// }
 

// // QutionandAnsController.php
// public function Qnsview($id)
// {
//       // Fetch the quiz information
//     //   $quizzes = Quiz::where('id', $id)->get(); // Adjust as needed
//     //   $quizzes = Quiz::with('questions', 'subject')->get();
//   // Fetch all questions for the given quiz_id, ordered by quiz_id
//     //  $questions = Question::where('quiz_id', $id)
//     //   ->orderBy('quiz_id', 'asc')
//     //   ->get();

//     // Fetch quizzes with related subjects and questions
//     $quizzes = Quiz::with(['subject', 'questions'])
//                    ->orderBy('exam_id')
//                    ->get()
//                    ->groupBy('exam_id'); // Grouping quizzes by exam_id
      
//     // Pass the question data to the view
//     return view('Admin.Q&A.Qnsview', compact( 'quizzes'));
// }
// public function Qnsview($id)
// {
//     // Fetch quizzes with related subjects and questions for the specific exam_id
//     // $quizzes = Quiz::with(['subject', 'questions']) // 'questions' is the relationship
//     //                ->where('exam_id', $id)
//     //                ->get(); // This will return a collection of quiz objects
//     $quizzes = Quiz::where('exam_id', $id)->get();

//     // Pass the quizzes to the view
//     return view('Admin.Q&A.Qnsview', compact('quizzes', 'id'));
// }


// public function showQuizzes($id)
// {
//     // Fetch quizzes or other data based on the exam id
//     $quizzes = Quiz::where('exam_id', $id)->get();

//     // Pass the $id to the view
//     return view('Admin.Q&A.quizzes', compact('quizzes', 'id'));
// }



//  // Method to display a specific quiz in PDF view
//  public function showQnsviewPdf($id)
//  {
//     $quizzes = Quiz::with(['subject', 'questions']) // 'questions' is the relationship
//     ->where('exam_id', $id)
//     ->get(); // This will return a collection of quiz objects

//      // Return a view to display the quiz details
//      return view('Admin.Q&A.Qnsview_pdf', compact('quizzes'));
//  }

// public function downloadQnsviewPdf($id)
// {
//     // Fetch quizzes for the PDF based on exam_id
//     $quizzes = Quiz::with(['subject', 'questions'])
//                    ->where('exam_id', $id)
//                    ->get();

//     // Generate the PDF using a view
//     $pdf = PDF::loadView('Admin.Q&A.Qnsview_pdf', compact('quizzes'));

//     // Return the generated PDF as a download
//     return $pdf->download('questions_view.pdf');
// }



public function download($id)
{
    // Fetch the question or quiz based on the ID
    $question = Question::findOrFail($id);

    // Assuming you want to download the question text as a text file
    $filename = 'question_' . $question->id . '.txt';
    $content = "Question: " . $question->question_text . "\n"
               . "Option A: " . $question->option_a . "\n"
               . "Option B: " . $question->option_b . "\n"
               . "Option C: " . $question->option_c . "\n"
               . "Option D: " . $question->option_d;

    // Create the response for file download
    return Response::make($content, 200, [
        'Content-Type' => 'text/plain',
        'Content-Disposition' => 'attachment; filename="' . $filename . '"',
    ]);
}


// // 
// public function Ansview($id)
// {
//     // Fetch all quizzes with their questions and subjects

//       $quizzes = Quiz::with(['subject', 'questions']) // 'questions' is the relationship
//       ->where('exam_id', $id)
//       ->get(); // This will return a collection of quiz objects


 
//     // Pass both quizzes and questions to the view
//     return view('Admin.Q&A.Ansview', compact( 'quizzes', 'id'));
// }


// public function downloadAnsviewPdf($id)
// {
//     // Fetch the quizzes with related subjects and questions based on the provided exam_id
//     $quizzes = Quiz::with(['subject', 'questions'])
//                    ->where('exam_id', $id)
//                    ->get(); // This will return a collection of quiz objects

//     // Check if quizzes are found
//     if ($quizzes->isEmpty()) {
//         return redirect()->back()->with('error', 'No quizzes found for this exam.');
//     }

//     // Generate the PDF using a view
//     $pdf = PDF::loadView('Admin.Q&A.Ansview_pdf', compact('quizzes'));

//     // Return the generated PDF as a download
//     return $pdf->download('answers_view.pdf');
// }

// public function downloadAnsviewPdf()
// {
//     // Fetch all quizzes with their related data
//     $quizzes = Quiz::with([
//         'exam',
//         'subject',
//         'questions'
//     ])->get();

//     // Generate PDF with the fetched data
//     $pdf = Pdf::loadView('Admin.Q&A.Ansview_pdf', compact('quizzes'));

//     // Return the PDF as a download
//     return $pdf->download('Neet_online_exam_Ans.pdf');
// }

public function showAnsviewPdf($id)
{
    $quizzes = Quiz::with(['subject', 'questions'])
    ->where('exam_id', $id)
    ->get(); // This will return a collection of quiz objects

    // Return the view to display the quiz details
    return view('Admin.Q&A.Ansview_pdf', compact('quizzes'));
}

public function partview($id)
{
    // Fetch the part by its ID from the database
    $quizzes = quiz::findOrFail($id);
    
    // Fetch the related answer (if needed) for the part
    $answer = Answer::where('part_id', $id)->first(); 

    // Pass both variables to the view
    return view('Admin.Q&A.PartView', compact('part', 'answer'));
}


public function subjectview($id)
{
    // Fetch the subject by its ID from the database
    $subject = Subject::findOrFail($id);
    
    // Fetch the related answer (if needed) for the subject
    $answer = Answer::where('subject_id', $id)->first(); 

    // Pass both variables to the view
    return view('Admin.Q&A.SubjectView', compact('subject', 'answer'));
}





}
