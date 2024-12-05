<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;


    protected $fillable = [
        'student_id',
        'subject',
        'marks_obtained',
        'total_marks',
        'percentage',
        'grade',
        'exam_type',
        'exam_date',
        'remarks',
        'status',
        'teacher_name',
    ];

    // Define a relationship with the Student model (assuming it exists)
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Optional: Calculate the percentage automatically (you can also do this in the controller)
    public function getPercentageAttribute()
    {
        return ($this->marks_obtained / $this->total_marks) * 100;
    }

    // Optional: Automatically calculate the grade based on the percentage
    public function getGradeAttribute()
    {
        $percentage = $this->percentage;

        if ($percentage >= 90) {
            return 'A';
        } elseif ($percentage >= 75) {
            return 'B';
        } elseif ($percentage >= 60) {
            return 'C';
        } elseif ($percentage >= 45) {
            return 'D';
        } else {
            return 'F';
        }
    }
}
