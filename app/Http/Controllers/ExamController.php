<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Quiz;
use App\Models\Exam;
use App\Helpers\testshelpers;
use App\Models\QuizResult;
use App\Models\StudentAttempt;
use Carbon\Carbon;
use App\Models\SolutionFile;
use Illuminate\Support\Facades\Log;
use App\Models\TestSeriesPackage;
use App\Models\ExamPackage;

use App\Models\StudentAnswer;
use App\Jobs\SendQuizResultMail;
use Barryvdh\DomPDF\Facade\Pdf; // Make sure this import is correct
use App\Mail\StudentQuizResultMail;
use Illuminate\Support\Facades\Mail;

use App\Models\User;

use App\Models\File;
use App\Models\StudentQuizResponse;
use Illuminate\Support\Facades\Storage;
use TCPDF; // Make sure TCPDF is included
use App\Models\Answer;
use Illuminate\Support\Facades\DB;  // Ensure this line is present
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;
use App\Models\ExamAttempt;

use App\Models\Test;

class ExamController extends Controller
{

  public function start()
{
    // Fetch the authenticated user's ID (if needed)
    $userId = Auth::id();

    // Retrieve data using a helper function
    // Ensure the `get_start_test_data()` helper function exists and works as expected
    $data = get_start_test_data();

    // Check if data retrieval was successful
    if (!$data) {
        return redirect()->route('errorPage')->with('error', 'Failed to retrieve test data. Please try again.');
    }

    // Pass the data to the view
    return view('exam.starttest', $data);
}


    
    public function startExam($examId)
    {
        $userId = Auth::id(); // Fetch the authenticated user's ID
    
        // Check if the user has already attempted this exam
        $hasAttempted = StudentAttempt::where('user_id', $userId) // Change to user_id
                        ->where('exam_id', $examId)
                        ->exists();
    
        if ($hasAttempted) {
            return redirect()->back()->with('message', 'You have already attempted this exam.');
        }
    
        // Check if the exam is active
        $exam = Exam::findOrFail($examId);
        $currentDateTime = Carbon::now();
    
        if ($currentDateTime->isBefore($exam->started_date) || $currentDateTime->isAfter($exam->finish_date)) {
            return redirect()->back()->with('message', 'The exam is not available at this time.');
        }
    
        // Create a new attempt record
        StudentAttempt::create([ // Change to UserAttempt model
            'user_id' => $userId, // Use user_id for the authenticated user
            'exam_id' => $examId,
            'attempt_number' => 1, // Set to 1 as it's the first attempt
            'attempt_date' => Carbon::now(),
        ]);
    
        // Redirect to the exam page or load the exam interface
        return redirect()->route('exam.test', ['examId' => $examId]);
    }
    
    

    // public function attempt($examId)
    // {
    //     $exam = Exam::findOrFail($examId);
    //     $studentId = Auth::id();

    //     // Check how many attempts have been made
    //     $attemptCount = StudentAttempt::where('exam_id', $examId)
    //         ->where('student_id', $studentId)
    //         ->count();

    //     if ($attemptCount >= $exam->attempt) {
    //         return redirect()->back()->with('error', 'You have exhausted your attempts.');
    //     }

    //     // Check if the exam is within the allowed date range
    //     $currentDateTime = Carbon::now();
    //     if ($currentDateTime->isBefore($exam->started_date) || $currentDateTime->isAfter($exam->finish_date)) {
    //         return redirect()->back()->with('error', 'The exam is not available at this time.');
    //     }

    //     // Create a new attempt entry
    //     StudentAttempt::create([
    //         'student_id' => $studentId,
    //         'exam_id' => $examId,
    //         'attempt_number' => $attemptCount + 1,
    //         'attempt_date' => $currentDateTime,
    //     ]);

    //     // Redirect to the exam start page
    //     return redirect()->route('exam.test', $examId);
    // }
    
    // public function storeAttempt(Request $request)
    // {
    //     $studentId = Auth::id();
    //     $examId = $request->input('exam_id'); 
    //     $attemptedAt = now();
        
    //     // Fetch the exam and the allowed attempts
    //     $exam = Exam::findOrFail($examId);
    //     $maxAttempts = $exam->attempt;
    
    //     // Check how many attempts the student has made for this exam
    //     $attemptCount = ExamAttempt::where('exam_id', $examId)
    //                                ->where('student_id', $studentId)
    //                                ->count();
    
    //     // Check if the student has already used all attempts
    //     if ($attemptCount >= $maxAttempts) {
    //         return redirect()->back()->with('error', 'You have already used all your attempts for this exam.');
    //     }
    
    //     // Create a new attempt record
    //     ExamAttempt::create([
    //         'exam_id' => $examId,
    //         'student_id' => $studentId,
    //         'attempted_at' => $attemptedAt,
    //     ]);
    
    //     // Redirect to the exam start page, passing the exam ID
    //     return redirect()->route('exam.test', ['exam' => $examId]);
    // }
    
 


public function storeAttempt($examId)
{
    $userId = Auth::id(); // Correctly get the ID of the authenticated user

    // Fetch the exam and check if it exists
    $exam = Exam::findOrFail($examId);

    // Check if the current date is within the allowed exam period
    if (now()->lt($exam->started_date) || now()->gt($exam->finish_date)) {
        return redirect()->back()->with('error', 'This exam is not available at the moment.');
    }

    // Fetch the user's exam attempt record or create a new one
    $examAttempt = ExamAttempt::firstOrCreate([ // Change to UserAttempt model
        'user_id' => $userId, // Use user_id for the authenticated user
        'exam_id' => $examId,
    ]);

    // Check if the user has exhausted the allowed attempts
    if ($examAttempt->attempt_count >= $exam->attempt) {
        return redirect()->back()->with('error', 'You have exhausted all attempts for this exam.');
    }

    // Increment the attempt count and allow the user to proceed
    $examAttempt->increment('attempt_count');

    // Redirect to the exam start page
    return redirect()->route('exam.start', $examId);
}


    public function results()
    {
        $tests = Test::where('user_id', Auth::id())->latest()->first();
        return view('exam.results', compact('tests'));
    }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             


    public function startTest()
    {
        $user = Auth::user(); // Fetch user details from the authenticated user
        $question = Question::first(); // Fetch a sample question or logic to get relevant questions
        $time = 60; // Example fixed time per question
    
        return view('exam.start', compact('user', 'question', 'time'));
    }
    

    public function showResults()
    {
        $user = Auth::user(); // Fetch user details from the authenticated user
        $finalScore = 85; // Example score, replace with actual data
        $totalMarksObtained = 90; // Example total marks, replace with actual data
        $subjectsResults = [
            ['subject' => 'Math', 'attempted' => 10, 'correct' => 8, 'negative' => 2, 'score' => 16],
            ['subject' => 'Science', 'attempted' => 10, 'correct' => 7, 'negative' => 3, 'score' => 14],
            // Add more subjects as needed
        ];
    
        return view('exam.results', compact('user', 'finalScore', 'totalMarksObtained', 'subjectsResults'));
    }
    
// public function logout(Request $request)
// {
//     Auth::logout();
    
//     // Optionally invalidate the session
//     $request->session()->invalidate();
//     $request->session()->regenerateToken();

//     // Redirect to the login page or another route
//     return redirect()->route('student.login');
// }

 // Handle logout

 public function logout()
{
    Auth::logout(); // Use the default guard for users
    return redirect()->route('login'); // Update route name as necessary
}

public function index(Request $request)
{
    $package = ExamPackage::where('active', true)->get();  // Retrieve active packages

    $user = Auth::user(); // Fetch user details from the authenticated user

    // Check if the user is null
    if (is_null($user)) {
        return redirect()->route('login')->withErrors(['message' => 'You need to log in first.']);
    }

    // Load the packages relationship if it hasn't been loaded yet

    return view('exam.index', compact('user', 'package')); // Pass both 'user' and 'packages' to the view
}


public function processPayment(Request $request)
{
    $package_id = $request->package_id;
    $amount = $request->amount; // Ensure this matches the actual package price
    $user = Auth::user();

    // Prepare request data for PhonePe API
    $paymentData = [
        'merchantId' => env('PHONEPE_MERCHANT_ID'),
        'transactionId' => uniqid(), // Generate a unique transaction ID
        'amount' => $amount * 100, // Amount in paise (e.g., 1600 INR = 160000 paise)
        'redirectUrl' => route('confirm.payment', ['package_id' => $package_id]),
        'callbackUrl' => route('payment.callback'), // Optional callback for server-side verification
        'user' => [
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone_number, // Ensure phone number is available
        ]
    ];

    // Send payment request to PhonePe API and get a payment URL
    $paymentUrl = $this->initiatePhonePePayment($paymentData); // Custom method to initiate the payment

    // Redirect user to the payment URL
    return redirect($paymentUrl);
}


private function initiatePhonePePayment($paymentData)
{
    $endpoint = "https://api.phonepe.com/apis/merchant/v1/payment/initiate";
    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . env('PHONEPE_API_KEY'), // Replace with your API key
    ];

    $response = Http::withHeaders($headers)->post($endpoint, $paymentData);

    if ($response->successful()) {
        $responseData = $response->json();
        return $responseData['paymentUrl']; // Get the URL to redirect the user for payment
    }

    throw new \Exception('Payment initiation failed. Please try again.');
}


public function confirmPayment(Request $request)
{
    $package_id = $request->package_id;
    $user = Auth::user();

    // Call PhonePe API to verify payment status
    $isPaymentSuccessful = $this->verifyPaymentStatus($request->transactionId); // Custom verification method

    if ($isPaymentSuccessful) {
        // Activate the package
        $user->packages()->attach($package_id, [
            'active' => true,
            'start_date' => now(),
            'end_date' => now()->addYear(),
        ]);

        return redirect()->route('exam.index')->with('success', 'Your package has been activated. You can now start the test.');
    }

    return redirect()->route('exam.index')->withErrors(['message' => 'Payment verification failed.']);
}







public function show(Request $request)
{
    $user = Auth::user(); // Fetch user details from the authenticated user

    return view('exam.profile', compact('user')); // Pass the user data to the view
}


  
    // public function logout()
    // {
    //     Auth::guard('student')->logout();
    //     return redirect()->route('student.login');
    // }
 
    



  // In ExamController.php
  public function question($quizId, $questionId, $examId)
  {
      $question = Question::find($questionId);
      $quiz = Quiz::find($quizId);
      
      // Fetch additional data
      $user = Auth::user(); // Use the default guard to get the authenticated user
      $questionsCount = Question::count();
      $quizTime = $quiz ? $quiz->time_limit : 0;
  
      return view('exam.test', compact('user', 'questionsCount', 'quizTime', 'question', 'quizId', 'questionId'));
  }
  
  




  public function Qution(Request $request)
  {
      $user = Auth::user(); // Use the default guard to get the authenticated user
    
      $files = File::all();
  
      return view('exam.Qution_paper', compact('user', 'files')); // Pass the user data and files to the view
  }
  
  public function solution(Request $request)
  {
      $user = Auth::user(); // Use the default guard to get the authenticated user
    
      $files = SolutionFile::all();
  
      return view('exam.solution_paper', compact('user', 'files')); // Pass the user data and files to the view
  }
  

    public function viewPdf($id)
    {
        // Retrieve the file from the database using the given id
        $file = File::find($id); // Assuming you have a File model
    
        if (!$file) {
            abort(404, 'File not found.');
        }
    
        // Get the file path from the database (assuming 'path' is the column that stores the file path)
        $filePath = $file->path;
    
        // Check if the file exists in the storage
        if (!Storage::disk('public')->exists($filePath)) {
            abort(404, 'File not found in storage.');
        }
    
        // Get the file content from the storage
        $fileContent = Storage::disk('public')->get($filePath);
    
        // Return the file with headers to display it as PDF in the browser
        return response($fileContent, 200)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'inline; filename="'.basename($filePath).'"');

 }


 public function showQuiz(Request $request, $examId)
 {
     // Fetch the quizzes for the provided examId, including questions and their options
     $quizzes = Quiz::with(['questions.options'])->where('exam_id', $examId)->get();
 
     // Split the questions into Part A and Part B if the quiz has parts
     $questionsPartA = Question::where('exam_id', $examId)
                               ->where('part', 'A')
                               ->get();
 
     $questionsPartB = Question::where('exam_id', $examId)
                               ->where('part', 'B')
                               ->get();
 
     // Track the sequence number for questions
     $sn = 1; // Start question numbering at 1
 
     // Calculate the total number of questions across Part A and Part B
     $total = $questionsPartA->count() + $questionsPartB->count();
 
     // Fetch the time limit for the quiz if it's stored in the quizzes table (e.g., 'time_limit')
     $quizTime = Quiz::where('exam_id', $examId)->value('time_limit'); // Assume a 'time_limit' field exists
 
     // Fetch user names (assuming it's passed via a request or other logic)
     // Adjust this line according to how you define users in your application
     $userNames = User::pluck('name'); // Assuming you have a User model instead of Student
 
     // Pass all necessary data to the view
     return view('exam.test', [
         'quizzes' => $quizzes,
         'questionsPartA' => $questionsPartA,
         'questionsPartB' => $questionsPartB,
         'sn' => $sn,
         'total' => $total,
         'eid' => $examId,
         'quizTime' => $quizTime,
         'userNames' => $userNames // Changed to userNames
     ]);
 }
 



 // Function to display the quiz
 public function quiz($exam_id)
 {
     // Retrieve quizzes and questions
     $quizzes = Quiz::where('exam_id', $exam_id)->with('questions.options')->get();
     $questionsPartA = Question::where('part', 'A')->get(); // Adjust based on your logic
     $questionsPartB = Question::where('part', 'B')->get(); // Adjust based on your logic

     return view('quiz.show', compact('quizzes', 'questionsPartA', 'questionsPartB'));
 }

 // Function to update quiz answers
 public function update(Request $request, $quiz_id)
 {
     // Validate the input
     $request->validate([
         'answer' => 'required|array',
         'eid' => 'required',
         'n' => 'required',
         't' => 'required'
     ]);

     // Retrieve the quiz by ID
     $quiz = Quiz::findOrFail($quiz_id);
     $examId = $request->input('eid');
     $user = Auth::user(); // Assuming you have user authentication

     // Process the answers
     $answers = $request->input('answer');

     foreach ($answers as $questionId => $selectedOptionId) {
         $question = Question::find($questionId);

         if ($question) {
             // Save the user's answer (this assumes an Answer model exists)
             Answer::updateOrCreate(
                 [
                     'user_id' => $user->id,
                     'quiz_id' => $quiz_id,
                     'question_id' => $questionId,
                 ],
                 [
                     'option_id' => $selectedOptionId,
                 ]
             );
         }
     }

     // Redirect to a result page or back with a success message
     return redirect()->route('quiz.show', ['exam_id' => $examId])
                      ->with('success', 'Your answers have been submitted successfully.');
 }

// protected function storeAnswer($examId, $questionId, $optionId)
// {
//     // Store or update the answer in the database
//     // You may need to adjust this based on your database structure
//     $answer = Answer::updateOrCreate(
//         ['exam_id' => $examId, 'question_id' => $questionId],
//         ['option_id' => $optionId]
//     );
// }

// public function test($quizId, $examId)
// {
//     $studentId = Auth::id();

//     // Fetch the exam
//     $exam = Exam::findOrFail($examId);

//     // Count how many attempts the student has made for this exam
//     $attemptCount = StudentAttempt::where('student_id', $studentId)
//                     ->where('exam_id', $examId)
//                     ->count();

//     // Check if the student has reached the maximum allowed attempts
//     if ($attemptCount >= $exam->attempt) {  // Note: Ensure 'attempt' is the correct field name in your exams table
//         return redirect()->back()->with('message', 'You have reached the maximum number of attempts for this exam.');
//     }

//     // Create a new attempt record
//     StudentAttempt::create([
//         'student_id' => $studentId,
//         'exam_id' => $examId,
//         'attempt_number' => $attemptCount + 1, // Increment attempt number
//         'attempt_date' => Carbon::now(),
//     ]);

//     // Fetch the specific quiz along with its related questions and subject
//     $quiz = Quiz::with('questions')->findOrFail($quizId);

//     // Fetch all quizzes related to the exam
//     $quizzes = Quiz::with(['questions', 'subject'])->where('exam_id', $examId)->get();

//     // Fetch Part A and Part B questions separately
//     $questionsPartA = Question::whereHas('quiz', function($query) use ($examId) {
//         $query->where('exam_id', $examId)
//               ->where('part', 'A'); // Part A questions (first 35)
//     })->get();

//     $questionsPartB = Question::whereHas('quiz', function($query) use ($examId) {
//         $query->where('exam_id', $examId)
//               ->where('part', 'B'); // Part B questions (last 10)
//     })->get();

//     // Merge Part A and Part B questions
//     $questions = $questionsPartA->merge($questionsPartB);

//     // Retrieve the time limit for the current quiz
//     $quizTime = $quiz->time_limit;

//     // Fetch authenticated student details
//     $student = Auth::guard('student')->user();

//     // Pass all necessary data to the view
//     return view('exam.test', [
//         'quizzes' => $quizzes,
//         'quiz' => $quiz,
//         'examId' => $examId,
//         'quizTime' => $quizTime,
//         'student' => $student,
//         'questionsPartB' => $questionsPartB, // Part B questions
//         'questions' => $questions // All questions
//     ]);
// }


public function test($quizId, $questionId, $examId)
{
    $userId = Auth::id(); // Get the authenticated user's ID
    // Fetch the exam by ID or fail if not found
    $exam = Exam::findOrFail($examId);

    // Count how many attempts the user has made for this exam
    $attemptCount = StudentAttempt::where('user_id', $userId) // Adjusted to use 'user_id'
                    ->where('exam_id', $examId)
                    ->count();

    // Check if the user has reached the maximum allowed attempts
    if ($attemptCount >= $exam->attempt) {  // Ensure 'attempt' is the correct field name in your exams table
        return redirect()->back()->with('message', 'You have reached the maximum number of attempts for this exam.');
    }

    // Create a new attempt record
    StudentAttempt::create([
        'user_id' => $userId, // Adjusted to use 'user_id'
        'exam_id' => $examId,
        'attempt_number' => $attemptCount + 1, // Increment attempt number
        'attempt_date' => Carbon::now(),
    ]);

    // Fetch the specific quiz along with its related questions and subject
    $quiz = Quiz::with(['questions', 'subject'])->findOrFail($quizId);

    // Fetch all quizzes related to the exam
    $quizzes = Quiz::with(['questions', 'subject'])->where('exam_id', $examId)->get();

    // Separate Part B questions (assuming 'part' column exists in questions table)
    $questionsPartB = Question::whereHas('quiz', function($query) use ($examId) {
        $query->where('exam_id', $examId)
              ->where('part', 'B'); // Fetch only Part B questions
    })->get();

    // Retrieve the time limit for the current quiz
    $quizTime = $quiz->time_limit; // Fetch the time_limit from the quiz

    // Fetch authenticated user details
    $user = Auth::user(); // Adjusted to use Auth::user()

    // Pass all necessary data to the view
    return view('exam.test', [
        'quizzes' => $quizzes,
        'quiz' => $quiz,
        'examId' => $examId,
        'quizTime' => $quizTime,
        'user' => $user, // Pass user details to the view
        'questionsPartB' => $questionsPartB, // Pass Part B questions to the view
    ]);
}






public function submitQuiz(Request $request)
{
    // Validate incoming request data
    $request->validate([
        'answers' => 'required|array',
        'exam_id' => 'required|integer',
        'quiz_id' => 'required|integer',
    ]);

    // Retrieve input data
    $answers = $request->input('answers');
    $examId = $request->input('exam_id');
    $quizId = $request->input('quiz_id');

    // Define subjects and initialize results
    $subjects = ['Physics', 'Chemistry', 'Botany', 'Zoology'];
    $results = [];
    $totalScore = 0;

    // Loop through each subject
    foreach ($subjects as $subject) {
        $subjectModel = Subject::where('name', $subject)->first();
        if (!$subjectModel) continue; // Skip if subject not found

        // Fetch the quiz associated with the subject
        $quiz = Quiz::where('exam_id', $examId)
                    ->where('subject_id', $subjectModel->id)
                    ->with('questions')
                    ->first();

        if (!$quiz) continue; // Skip if no quiz found

        $questions = $quiz->questions;

        // Score calculation for Part A
        [$partAScore, $attemptedCountA, $correctCountA, $incorrectCountA] = $this->calculatePartScore(
            $questions->take(35),
            $answers
        );

        // Score calculation for Part B
        $partBQuestions = $questions->skip(35); // Skip the first 35 questions
        Log::info('Part B questions count: ' . $partBQuestions->count());

        if ($partBQuestions->count() > 0) {
            // Get the first 10 questions from Part B for scoring
            $partBQuestionsToScore = $partBQuestions->take(10);
            Log::info('Part B questions to score count: ' . $partBQuestionsToScore->count());

            // Pass the questions and user answers to the calculatePartScore method
            [$partBScore, $attemptedCountB, $correctCountB, $incorrectCountB] = $this->calculatePartScore(
                $partBQuestionsToScore,
                $answers 
            );
        } else {
            // Initialize scores for Part B if no questions are available
            $partBScore = 0;
            $attemptedCountB = 0;
            $correctCountB = 0;
            $incorrectCountB = 0;
            Log::info('No questions available for Part B scoring.');
        }

        // Total score for the subject
        $totalSubjectScore = $partAScore + $partBScore;
        $totalScore += $totalSubjectScore;

        // Calculate not attempted questions
        $notAttemptedQuestions = $questions->count() - ($attemptedCountA + $attemptedCountB);

        // Store results for the subject
        $results[$subject] = [
            'subject_id' => $subjectModel->id,
            'attempted_questions' => $attemptedCountA + $attemptedCountB,
            'not_attempted_questions' => $notAttemptedQuestions,
            'correct' => $correctCountA + $correctCountB,
            'incorrect' => $incorrectCountA + $incorrectCountB,
            'part_a_score' => $partAScore,
            'part_b_score' => $partBScore,
            'total_score' => $totalSubjectScore,
        ];

        // Save results to the database
        QuizResult::create([
            'user_id' => Auth::id(), // Change from 'student_id' to 'user_id'
            'exam_id' => $examId,
            'quiz_id' => $quiz->id,
            'subject_id' => $subjectModel->id,
            'attempted_questions' => $attemptedCountA + $attemptedCountB,
            'not_attempted_questions' => $notAttemptedQuestions,
            'correct_count' => $correctCountA + $correctCountB,
            'incorrect_count' => $incorrectCountA + $incorrectCountB,
            'part_a_score' => $partAScore,
            'part_b_score' => $partBScore,
            'total_score' => $totalSubjectScore,
        ]);
    }

    // Overall score calculation
    $maxTotalMarks = 720; // Maximum marks for the exam
    $percentage = ($totalScore / $maxTotalMarks) * 100; // Calculate percentage

    // Get the logged-in user details
    $user = Auth::user(); // Changed from 'student' to 'user'
    $userName = $user->name;
    $userEmail = $user->email;

    // Get exam details based on exam_id
    $exam = Exam::find($examId); // Assuming you have an Exam model
    $examName = $exam ? $exam->exam_name : 'Unknown Exam'; // Check if exam exists and get its name

    // Prepare quiz result data for mailing
    $quizResult = [
        'user_id' => $user->id, // Change from 'student_id' to 'user_id'
        'user_name' => $userName,
        'totalScore' => $totalScore,
        'maxTotalMarks' => $maxTotalMarks,
        'percentage' => $percentage,
        'results' => $results,
        'examId' => $examId,
        'exam_date' => now(), // Replace with the actual exam date if needed
        'exam_name' => $examName, // Use the exam name retrieved
        'started_date' => $exam->started_date,
        'finish_date' => now(), // Replace with the actual finish date if needed
        'registration_number' => $user->registration_number ?? 'N/A', // Include registration number
    ];

    // Dispatch the email job with a 24 hourse
// Dispatch the email job with a 24-hour delay
SendQuizResultMail::dispatch($quizResult, $userEmail)
    ->delay(Carbon::now()->addHours(25)); // Delay by 25 hours instead of 24


    // Flash success message
    session()->flash('success', 'Results have been submitted, and you will receive the total score for each subject via email shortly. Thank you!');

    // Return the result view with results for each subject
    return view('exam.results', [
        'results' => $results,
        'totalScore' => $totalScore,
        'maxTotalMarks' => $maxTotalMarks,
        'percentage' => $percentage,
        'examId' => $examId,
        'user' => $user, // Pass the user instead of student
        'exam' => $exam,
    ]);
}



/**
 * Calculate the score for a given part (A or B) of the quiz.
 *
 * @param \Illuminate\Support\Collection $questions
 * @param array $answers
 * @return array
 */
private function calculatePartScore($questions, $answers)
{
    $partScore = 0;
    $attemptedCount = 0;
    $correctCount = 0;
    $incorrectCount = 0;

    foreach ($questions as $question) {
        if (isset($answers[$question->id])) {
            $attemptedCount++;
            if ($answers[$question->id] === $question->correct_answer) {
                $partScore += 4; // Correct answer
                $correctCount++;
            } else {
                $partScore -= 1; // Incorrect answer
                $incorrectCount++;
            }
        }
    }

    return [$partScore, $attemptedCount, $correctCount, $incorrectCount];
}


public function downloadStudentPdf()
{
    // Fetch necessary student data
 
    $quizResults = QuizResult::with(['student', 'exam', 'subject'])->get();

    // Load a view to generate the PDF
    $pdf = PDF::loadView('Admin.Mark.studentpdf', compact('quizResults'));

    // Return the generated PDF for download
    $pdf->setPaper('A4', 'portrait'); // Adjust the paper size as needed

    return $pdf->download('NEET Student Test.pdf');
}


public function studentPdf($id)
{
    // Find the specific quiz result
    $quiz_results = Quizresult::findOrFail($id);

    // Load the view for displaying the data
    return view('Admin.Mark.studentpdf', compact('quiz_results'));
}




public function result(Request $request)
 {
     // This method can render a result view or handle post-quiz actions
     return view('exam.results', [
         'score' => $request->session()->get('score')
     ]);
 }



}

 

