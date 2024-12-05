<?php

namespace App\Http\Controllers;
use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use App\Models\Exam;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\ExamQuestion;

use Illuminate\Http\Request;

class addQutionController extends Controller
{
     // Method to show the list of questions
     public function index()
    {
        return view('Admin.Q&A.add_qution'); // Make sure this view exists
    }
 
  
   
    
 
 public function create(Request $request)
{
    // Retrieve exam details from the request
    $examId = $request->input('exam_id');
    $subject = $request->input('subject');
    $part = $request->input('part');
    
    // Fetch the quiz based on the subject and part (assuming you have a Quiz model)
    $quiz = Quiz::where('subject_id', $subject)
                ->where('part', $part)
                ->first();
                

    // Check if quiz exists, handle if it doesn't
    if (!$quiz) {
        Log::error("Quiz not found for Subject: $subject, Part: $part");
        return redirect()->back()->with('error', 'Quiz not found for the provided subject and part.');
    }

    // Count questions and calculate the next question ID
    $questionCount = Question::where('quiz_id', $quiz->id)->count();
    $nextQuestionId = $questionCount + 1;

    // Log details for debugging
    Log::info('Exam ID: ' . $examId);
    Log::info('Subject: ' . $subject);
    Log::info('Part: ' . $part);
    Log::info('Quiz ID: ' . $quiz->id);
    Log::info('Next Question ID: ' . $nextQuestionId);

    // Pass data to the view
    return view('Admin.Q&A.create', compact('examId', 'subject', 'part', 'quiz', 'nextQuestionId'));
}

        
public function store(Request $request)
{
    $request->validate([
        'quiz_id' => 'required|integer',
        'question_text' => 'required|string',
        'question_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'solution_text' => 'required|string',
        'option_a' => 'required|string',
        'option_a_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'option_b' => 'required|string',
        'option_b_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'option_c' => 'required|string',
        'option_c_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'option_d' => 'required|string',
        'option_d_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'correct_answer' => 'required|in:a,b,c,d',
    ]);

    // Create a new Question instance
    $question = new Question();
    $question->quiz_id = $request->quiz_id;
    $question->question_text = $request->question_text;
    $question->solution_text = $request->solution_text;
    $question->option_a = $request->option_a;
    $question->option_b = $request->option_b;
    $question->option_c = $request->option_c;
    $question->option_d = $request->option_d;
    $question->correct_answer = $request->correct_answer;

    // Handle image uploads
    $imageFields = [
        'question_image' => 'questions',
        'option_a_image' => 'options',
        'option_b_image' => 'options',
        'option_c_image' => 'options',
        'option_d_image' => 'options',
    ];

    foreach ($imageFields as $field => $directory) {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $filename = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
            $file->move(public_path("public/{$directory}/"), $filename);
            $question->$field = $filename;
        }
    }

    // Save the question
    $question->save();

    // Log success
    Log::info('Question created successfully', ['id' => $question->id]);

    // Redirect or return response
    return redirect()->route('Admin.Q&A.index')->with('success', 'Question created successfully.');
}
   



     // Method to store a newly created question

 
     
     
     // Method to show a specific question
     public function show($id)
     {
         // Logic to retrieve and display a specific question
     }
 
     // Method to show a form for editing a question
     public function edit($id)
     {
         // Logic to retrieve and show the edit form for a specific question
     }
 
     // Method to update a specific question
     public function update(Request $request, $id)
     {
         // Logic to validate and update the question
     }
 
     // Method to delete a specific question
     public function destroy($id)
     {
         // Logic to delete the question
     }





}
