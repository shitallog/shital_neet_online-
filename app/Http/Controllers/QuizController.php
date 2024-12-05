<?php

namespace App\Http\Controllers;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Exam;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
  
    public function index()
    {
        $quizzes = Quiz::with('questions', 'subject')->get();
    
        return view('Admin.Quiz.index', compact('quizzes')); // Use 'quizzes' here
    }
    
/**
     * Store a newly created quiz in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

 
     

public function store(Request $request)
{
    // Validate the request data
    $validated = $request->validate([
        'exam_id' => 'required|exists:exams,id|integer',
        'started_date' => 'nullable|date',
        'finish_date' => 'nullable|date',
        'subject_id' => 'required|exists:subjects,id',
        'mark' => 'required|integer|min:1',
        'total' => 'required|integer|min:1', 
        'right' => 'required|integer|min:0', 
        'wrong' => 'required|integer|min:0',
        'time_limit' => 'required|string',
        'part' => 'required|string',
        'desc' => 'required|string', // Added max length validation
    ]);

    $quizId = DB::table('quizzes')->insertGetId([
        'exam_id' => $validated['exam_id'],
        'started_date' => $validated['started_date'] ?? null, // Correctly assign started_date
        'finish_date' => $validated['finish_date'] ?? null,   // Correctly assign finish_date
        'subject_id' => $validated['subject_id'],
        'mark' => $validated['mark'],
        'total' => $validated['total'],
        'right' => $validated['right'],
        'wrong' => $validated['wrong'],
        'time_limit' => $validated['time_limit'],
        'part' => $validated['part'],
        'desc' => $validated['desc'],
    ]);
    
    return redirect()->route('Admin.Quiz.question-details', ['quizId' => $quizId, 'totalQuestions' => $request->input('total')])
    ->with('success', 'Quiz created successfully!');
}


    public function showQuestionForm($quizId, $totalQuestions)
    
    {
        return view('Admin.Quiz.question-details', compact('quizId', 'totalQuestions'));
    }



    // public function edit($id)
    // {
    //     // Fetch the quiz and related questions
    //     $quiz = Quiz::findOrFail($id);
    //     $questions = Question::all();
    //     return view('Admin.Quiz.edit', ['quiz' => $quiz, 'questions' => $questions]);
    // }

    

    public function update(Request $request, $id)
    {
        // Validate and update the quiz
        $validatedData = $request->validate([
            'exam_id' => 'required|exists:exams,id',
            'exam_time' =>  'required|date_format:H:i ',
            'date' => 'required|date', // Validate the date field
            'subject_id' => 'required|exists:subjects,id',
            'total' => 'required|integer',
            'right' => 'required|integer',
            'wrong' => 'required|integer',
            'time_limit' => 'required|string',
            'part' => 'required|string',
            'desc' => 'required|string',
            'questions' => 'required|array'
        ]);

        $quiz = Quiz::findOrFail($id);
        $quiz->update($validatedData);
        $quiz->questions()->sync($request->questions); // Assuming a many-to-many relationship

        return redirect()->route('Admin.Quiz.index')->with('success', 'Quiz updated successfully.');
    }

    public function destroy($id)
    {
        // Delete the quiz
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();
        return redirect()->route('Admin.Quiz.index')->with('success', 'Quiz deleted successfully.');
    }



    public function calculateMarks(Request $request)
    {
        $answers = $request->input('answers'); // An array of student answers
        $totalMarks = 0;

        foreach ($answers as $subject => $subjectAnswers) {
            foreach ($subjectAnswers as $part => $partAnswers) {
                foreach ($partAnswers as $questionId => $studentAnswer) {
                    // Retrieve the question from the database
                    $question = Question::find($questionId);

                    if ($question) {
                        // Determine marks based on the part
                        if ($part == 'A') {
                            // Part-A: Scoring rules
                            $marks = ($studentAnswer == $question->answer) ? 4 : -1;
                        } elseif ($part == 'B') {
                            // Part-B: Only the first 10 questions are considered
                            $marks = ($questionId <= 10) ? ($studentAnswer == $question->answer ? 4 : -1) : 0;
                        } else {
                            // If part is neither A nor B, no marks are awarded
                            $marks = 0;
                        }

                        // Add the marks to the total
                        $totalMarks += $marks;
                    }
                }
            }
        }

        // Return or store the total marks
        return $totalMarks;
    }


    
    public function addQuestions(Request $request)
    {
        
        $quizId = $request->input('quizId');
        $totalQuestions = $request->input('totalQuestions');
    
        for ($i = 1; $i <= $totalQuestions; $i++) {
            $question = new Question();
            $question->quiz_id = $quizId;
            $question->question_text = $request->input("qns$i");
    
      
              // Handle file uploads for the question image
        if ($request->hasFile("img$i")) {
            // Delete old image if it exists
            $existingImagePath = 'public/questions/' . $question->question_image;
            if (File::exists($existingImagePath)) {
                File::delete($existingImagePath);
            }


            // Upload new image
            $file = $request->file("img$i");
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('public/questions/', $filename);
            $question->question_image = $filename;
        }
    
    
          

    
            $question->solution_text = $request->input("solution$i");
    
            // Handle mathematical equation for solution
           
    
            $question->option_a = $request->input("{$i}1");
            $question->option_b = $request->input("{$i}2");
            $question->option_c = $request->input("{$i}3");
            $question->option_d = $request->input("{$i}4");
    
            // Handle image uploads for options
        

            if ($request->hasFile("optImg{$i}1")) {
                // Delete old image if it exists
                $existingImagePath = 'public/options/' . $question->option_a_image;
                if (File::exists($existingImagePath)) {
                    File::delete($existingImagePath);
                }
    
                // Upload new image
                $file = $request->file("optImg{$i}1");
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('public/options/', $filename);
                $question->option_a_image = $filename;
            }
        

            if ($request->hasFile("optImg{$i}2")) {
                // Delete old image if it exists
                $existingImagePath = 'public/options/' . $question->option_b_image;
                if (File::exists($existingImagePath)) {
                    File::delete($existingImagePath);
                }
    
                // Upload new image
                $file = $request->file("optImg{$i}2");
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('public/options/', $filename);
                $question->option_b_image = $filename;
            }
            
        

            if ($request->hasFile("optImg{$i}3")) {
                // Delete old image if it exists
                $existingImagePath = 'public/options/' . $question->option_c_image;
                if (File::exists($existingImagePath)) {
                    File::delete($existingImagePath);
                }
    
                // Upload new image
                $file = $request->file("optImg{$i}3");
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('public/options/', $filename);
                $question->option_c_image = $filename;
            }

            if ($request->hasFile("optImg{$i}4")) {
                // Delete old image if it exists
                $existingImagePath = 'public/options/' . $question->option_d_image;
                if (File::exists($existingImagePath)) {
                    File::delete($existingImagePath);
                }
    
                // Upload new image
                $file = $request->file("optImg{$i}4");
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('public/options/', $filename);
                $question->option_d_image = $filename;
            }

        
      
    
            $question->correct_answer = $request->input("ans$i");
            $question->save();
        }
    
        return redirect()->route('Admin.Q&A.index')->with('success', 'Questions added successfully!');
    }
    
}

 

    

