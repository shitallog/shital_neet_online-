<?php

namespace App\Http\Controllers;
use App\Models\Question;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{

  
 public function create()
    {
        return view('Admin.Quiz.create');
    }

    
    public function question_details()
    {
        return view('Admin.Quiz.question-details');
    }

    

    public function showForm(Request $request)
    {
        // Assuming 'n' and 'eid' are passed as query parameters
        $numberOfQuestions = $request->get('n');
        $examId = $request->get('eid');

        return view('Admin.Quiz.question-details', compact('numberOfQuestions', 'examId'));
    }
 

    
 /*
    public function addQuestions(Request $request)
{
    // Validate and process the request data
    $request->validate([
        'question' => 'required|string',
        'option_a' => 'required|string',
        'option_b' => 'required|string',
        'option_c' => 'required|string',
        'option_d' => 'required|string',
        'correct_answer' => 'required|in:a,b,c,d',
    ]);

    DB::table('questions')->insert([
        'quiz_id' => $request->input('quizId'),
        'qid' => uniqid(), // or another logic for qid
        'question_text' => $request->input('question'),
        'option_a' => $request->input('option_a'),
        'option_b' => $request->input('option_b'),
        'option_c' => $request->input('option_c'),
        'option_d' => $request->input('option_d'),
        'correct_answer' => $request->input('correct_answer'),
        'sn' => 1, // or appropriate logic
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('Admin.Quiz.index')->with('success', 'Questions added successfully!');
}*/

   /* public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate($this->validationRules($request));
    
        // Process each question
        $questions = [];
        for ($i = 1; $i <= $request->input('totalQuestions'); $i++) {
            $questionData = [
                'qns' => $request->input("qns{$i}"),
                'option_a' => $request->input("{$i}1"),
                'option_b' => $request->input("{$i}2"),
                'option_c' => $request->input("{$i}3"),
                'option_d' => $request->input("{$i}4"),
                'correct_answer' => $request->input("ans{$i}"),
            ];
    
            // Handle image upload
            if ($request->hasFile("img{$i}")) {
                $image = $request->file("img{$i}");
                $imagePath = $image->store('images/questions', 'public');
                $questionData['image_path'] = $imagePath;
            }
    
            $questions[] = $questionData;
        }
    
        // Save questions to the database
        foreach ($questions as $question) {
            Question::create($question);
        }
    
        // Redirect with a success message
        return redirect()->route('questions.form')->with('success', 'Questions added successfully!');
    }
    
    private function validationRules(Request $request)
    {
        $n = $request->input('totalQuestions'); // Fetch 'totalQuestions' from the request
    
        // Ensure 'totalQuestions' is an integer and greater than 0
        if (!is_numeric($n) || (int)$n <= 0) {
            abort(400, 'Invalid number of questions.');
        }
    
        $rules = [
            'totalQuestions' => 'required|integer|min:1',
        ];
    
        for ($i = 1; $i <= $n; $i++) {
            $rules["qns{$i}"] = 'required|string';
            $rules["{$i}1"] = 'required|string';
            $rules["{$i}2"] = 'required|string';
            $rules["{$i}3"] = 'required|string';
            $rules["{$i}4"] = 'required|string';
            $rules["ans{$i}"] = 'required|in:a,b,c,d';
            $rules["img{$i}"] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'; // Image validation rules
        }
    
        return $rules;
    }
    public function addQuestions(Request $request)
    {
        $quizId = $request->input('quizId');
        $totalQuestions = $request->input('totalQuestions');
    
        for ($i = 1; $i <= $totalQuestions; $i++) {
            // Generate a unique ID for the question
            $qid = uniqid();
            $qns = $request->input('qns' . $i);
    
            // Insert the question
            DB::table('questions')->insert([
                'quiz_id' => $quizId,
                'qid' => $qid,
                'qns' => $qns,
                'sn' => $i
            ]);
    
            $options = [];
            for ($j = 1; $j <= 4; $j++) {
                // Generate a unique ID for the option
                $oid = uniqid();
                $option = $request->input($i . $j);
                $options[$j] = $oid;
    
                // Insert the option
                DB::table('options')->insert([
                    'qid' => $qid,
                    'option' => $option,
                    'oid' => $oid
                ]);
            }
    
            // Retrieve the correct answer from the form
            $ans = $request->input('ans' . $i);
            // Find the ID of the correct answer
            $ansid = $options[ord($ans) - 96];
    
            // Insert the correct answer
            DB::table('answers')->insert([
                'qid' => $qid,
                'ansid' => $ansid
            ]);
        }
    
        return redirect()->route('Admin.Quiz.index')->with('success', 'Questions added successfully!');
    }
    

*/



public function destroy($id)
{
    $question = Question::findOrFail($id);
    $question->delete();

    return redirect()->back()->with('success', 'Question deleted successfully');
}


 






}
