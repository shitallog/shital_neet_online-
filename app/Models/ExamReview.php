<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_name',
        'exam_date',
        'total_questions',
        'attempted_questions',
        'correct_answers',
        'incorrect_answers',
        'review_status',
        'review_date',
        'reviewer_comments',
    ];
}
