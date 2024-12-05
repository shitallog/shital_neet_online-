<?php

namespace App\Notifications;
use App\Models\Quiz;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ExamNotification extends Notification
{
    use Queueable;

    
    protected $quiz; // Add this line

    /**
     * Create a new notification instance.
     * 
     
     */
    public function __construct($quiz)
    {
        $this->quiz = $quiz;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $quiz = $this->quiz;

        return (new MailMessage)
            ->subject('New Exam Declared: ' . $quiz->name)
            ->line('A new exam has been declared.')
            ->line('Exam Name: ' . $quiz->name)
            ->line('Date: ' . $quiz->date)
            ->line('Time: ' . $quiz->time) // Assuming `time` is a property of $quiz
            ->line('Subject: ' . $quiz->subject)
            ->action('View Exam', url('/quizzes/' . $quiz->id))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        return [
            'quiz_id' => $this->quiz->id,
            'quiz_name' => $this->quiz->name,
        ];
    }
    


    
}
