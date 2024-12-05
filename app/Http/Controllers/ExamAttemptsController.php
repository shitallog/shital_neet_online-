<?php
namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Student;
use App\Models\ExamAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamAttemptsController extends Controller
{
   
    public function index()
    {
        $quizzes = DB::table('quizzes')
        ->join('subjects', 'quizzes.subject_id', '=', 'subjects.id')
        ->join('exams', 'quizzes.exam_id', '=', 'exams.id')
        ->select('quizzes.*', 'subjects.name as subject_name', 'exams.exam_name', 'exams.started_date as started_date') // Use correct column name
        ->get();
        return view('Admin.User.exam-attend', compact('quizzes'));
    } 

    public function Attend()
    {
        return view('Admin.User.Not-attend');
    }

    public function result()
    {
        return view('Admin.User.Not-attend');
    }
 
    public function startExam($examId)
{
    $userId = auth()->user()->id; // Assuming student is logged in

    // Check if the student has already attempted the exam
    $examAttempt = ExamAttempt::where('user_id', $userId)
                    ->where('user_id', $examId)
                    ->first();

    if ($examAttempt && $examAttempt->attempted) {
        return redirect()->back()->with('error', 'You have already attempted this exam.');
    }

    // Allow student to start the exam
    return view('exam.start', compact('examId'));
}  



    public function recordExamAttempt($examId)
    {
        $userId = auth()->user()->id;
    
        // Record that the student has started the exam
        $examAttempt = ExamAttempt::updateOrCreate(
            [
                'user_id' => $userId,
                'exam_id' => $examId
            ],
            [
                'attempted' => true,
                'attempt_date' => now()
            ]
        );
    }
    

}
