<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
class ExamDeclared extends Mailable
{
    use Queueable, SerializesModels;

    protected $quiz; // Add this line

    public function __construct($quiz)
    {
        $this->quiz = $quiz;
    }
    
    public function build()
    {
        return $this->view('emails.exam_declared')
                    ->with([
                        'name' => $this->quiz->name,
                        'date' => $this->quiz->date,
                        'time' => $this->quiz->time,
                        'subject' => $this->quiz->subject,
                        ])
                    
                    ->subject('Exam Declaration Notification');
    }
    

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Exam Declared',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.exam_declared', // Use the correct view name
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
}
