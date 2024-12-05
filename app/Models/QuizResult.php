<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    use HasFactory;

    // Specify the table name if it's different from the plural form of the model name
        protected $table = 'quiz_results';

        // Specify the fillable attributes
        protected $fillable = [
            'exam_id',
            'user_id',
            'quiz_id',
            'subject_id',
            'part_a_score',
            'part_b_score',
            'is_correct',
            'incorrect_count',
            'attempted_questions',
            'not_attempted_questions',
            'total_score'
        ];
    


    // Relationship to the Subject model
         public function subject()
         {
        return $this->belongsTo(Subject::class);
         }
        // Define relationships if needed
        public function student()
        {
            return $this->belongsTo(Student::class);
        }
    
        public function quiz()
        {
            return $this->belongsTo(Quiz::class);
        }
        
        public function exam()
         {
             return $this->belongsTo(Exam::class);
         }


         public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}



}
