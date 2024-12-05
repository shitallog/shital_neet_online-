<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttempt extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'exam_id', 'attempt_number', 'score', 'attempt_date'];

    // Relationship to exams
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
