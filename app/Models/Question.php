<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; // Not strictly necessary since 'id' is default

    protected $table = 'questions'; // Ensure this is correct
    // protected $primaryKey = 'questions_id'; // Ensure this is your primary key
    public $incrementing = true; // This should be true if it's an auto-incrementing field
    protected $fillable = [
        'quiz_id',
        'question_text',
        'question_image',
        'solution_text',
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

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }


    // public function exam()
    // {
    //     return $this->belongsTo(Exam::class, 'quiz_id');
    // }
    /**
     * Get the subject that the question belongs to.
     */
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


// // In Question.php model
// public function option_a()
// {
//     return $this->belongsTo(Question::class, 'option_a'); // Adjust the foreign key and related model as needed
// }

// public function option_b()
// {
//     return $this->belongsTo(Question::class, 'option_b'); // Adjust the foreign key and related model as needed
// }

// public function option_c()
// {
//     return $this->belongsTo(Question::class, 'option_c'); // Adjust the foreign key and related model as needed
// }

// public function option_d()
// {
//     return $this->belongsTo(Question::class, 'option_d'); // Adjust the foreign key and related model as needed
// }

// public function questions()
// {
//     return $this->hasMany(Question::class, 'subject_id');
// }

// public function subject()
// {
//     return $this->belongsTo(Subject::class, 'subject_id');
// }
// Assuming the 'quiz_id' column exists in your questions table
public function quiz()
{
    return $this->belongsTo(Quiz::class); // Adjust if the Quiz model is located in a different namespace
}



// public function options()
// {
//     return $this->hasMany(Option::class);
// }

}
