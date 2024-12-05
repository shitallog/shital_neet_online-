<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StudentDetailsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $student;

    public function __construct( $student)
    {
        $this->student = $student;
    }

    public function build()
    {
        return $this->view('emails.student-details')
                    ->subject('Your Registration Details')
                    ->with([
                        'registrationNumber' => $this->student->registration_number,
                        'studentName' => $this->student->name,
                    ]);
    }
}
