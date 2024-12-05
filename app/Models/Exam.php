<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = ['exam_name', 'start_date','finish_date','time_limit','attempt'];

    protected $casts = [
        'started_date' => 'datetime',
        'finish_date' => 'datetime',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class); // Ensure the Student model exists
    }

//     public function attempts()
// {
//     return $this->hasMany(ExamAttempt::class);
// }

// Relationship to attempts
public function attempts()
{
    return $this->hasMany(StudentAttempt::class);
}

}
