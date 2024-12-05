<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'question_id',
        'given_answer',
        'is_correct'
      
    ];

    // Relationship to the Question model
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    // Relationship to the User model
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
