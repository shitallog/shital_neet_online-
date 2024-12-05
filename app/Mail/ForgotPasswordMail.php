<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordMail extends Mailable
{

    use Queueable, SerializesModels;

    public $student;
    public $link;

    public function __construct($student, $link)
    {
        $this->student = $student;
        $this->link = $link;
    }

    public function build()
    {
        return $this->view('emails.forgot_password')
                    ->with([
                        'link' => $this->link,
                    ]);
    }
}
