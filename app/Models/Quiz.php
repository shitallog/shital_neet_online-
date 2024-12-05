<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'exam_id',
        'start_date',
        'end_date',
        'subject_id',
        'mark',
        'total',
        'right',
        'wrong',
        'time_limit',
        'part',
        'desc'
    ];

     // Define relationships if necessary
      public function exam()
      {
          return $this->belongsTo(Exam::class);
      }


    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function quizResults()
    {
        return $this->hasMany(QuizResult::class);
    }
   

    public function students()
    {
        return $this->belongsToMany(Student::class); // Adjust if you have a different relationship
    }

    public function attempts()
    {
        return $this->hasMany(ExamAttempt::class, 'exam_id');
    }

    

//     // In your Quiz model
// public function subject()
// {
//     return $this->belongsTo(Subject::class); // Assuming subject belongs to a quiz
// }

// public function questions()
// {
//     return $this->hasMany(Question::class); // Assuming a quiz has many questions
// }

    
}
