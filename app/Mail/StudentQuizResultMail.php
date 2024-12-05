<?php

namespace App\Mail;
use App\Jobs\SendQuizResultMail;  // The job you created to send the email
use App\Models\QuizResult;        // Your model for saving quiz results
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StudentQuizResultMail extends Mailable
{
    use Queueable, SerializesModels;

    public $quizResult;
    public $totalScore;
    public $maxTotalMarks;
    public $percentage;
    

    public function __construct($quizResult)
    {
        $this->quizResult = $quizResult;
        $this->totalScore = $quizResult['totalScore'];          // Get total score
        $this->maxTotalMarks = $quizResult['maxTotalMarks'];    // Get max total marks
        $this->percentage = $quizResult['percentage'];            // Get percentage
    }

    public function build()
    {
        return $this->view('emails.studentQuizResult')
                    ->with([
                        'userName' => $this->quizResult['user_name'],
                        'examName' => $this->quizResult['exam_name'],
                        'totalScore' => $this->totalScore,
                        'maxTotalMarks' => $this->maxTotalMarks,
                        'percentage' => $this->percentage,
                        'results' => $this->quizResult['results'], // Pass results for each subject
                       'quizResult', $this->quizResult,
                    ])
                    ->subject('Monarch NEET Exam Result Notification');
    }
  
}
