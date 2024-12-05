<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentQuizResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'quiz_id',
        'exam_id',
        'answers',
        'score',
    ];
}
