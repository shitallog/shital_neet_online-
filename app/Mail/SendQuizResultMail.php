<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendQuizResultMail extends Mailable
{
    use Queueable, SerializesModels;

    public $quizResult;
    public $user;

    /**
     * Create a new message instance.
     */
    public function __construct($quizResult, $user)
    {
        $this->quizResult = $quizResult;
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Quiz Result Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',  // Update this with the correct view path
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Monarch NEET Exam Result Notification')
                    ->view('emails.studentQuizResult')
                    ->with([
                        'user' => $this->user,
                        'quizResult', $this->quizResult,
                    ]);
    }
}
