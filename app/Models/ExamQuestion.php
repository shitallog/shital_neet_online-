<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
   
    protected $fillable = [
        'quiz_id',
        'exam_id',
        'subject',
        'part',
        'questions_id ',
        'question_text',
        'question_image',
        'math_field',
        'solution_text',
        'math_field_solution',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'option_1_image',
        'option_2_image',
        'option_3_image',
        'option_4_image',
        'correct_answer',
    ];

    /**
     * Get the exam that owns the question.
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class); // Assuming you have an Exam model
    }


    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    

 // Question.php
public function answers()
{
    return $this->hasMany(Answer::class);
}


public function Questions() {
    return $this->hasMany(Question::class);
}

public function quiz()
{
    return $this->belongsTo(Quiz::class); // Adjust if the Quiz model is located in a different namespace
}


}
