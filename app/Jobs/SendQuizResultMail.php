<?php

namespace App\Jobs;
use App\Mail\StudentQuizResultMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendQuizResultMail implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $quizResult;
    public $userEmail;

    public function __construct($quizResult, $userEmail)
    {
        $this->quizResult = $quizResult;
        $this->userEmail = $userEmail;
    }

    public function handle()
    {
        Mail::to($this->userEmail)->send(new StudentQuizResultMail($this->quizResult));
    }
}

