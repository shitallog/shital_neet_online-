<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $casts = [
       'quiz_id',
        'question_id',
        'selected_option',
    ];

    // Answer.php
public function question()
{
    return $this->belongsTo(Question::class);
}

}
