<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

     protected $fillable = ['name', 'date'];

     protected $casts = [
        'date' => 'date',
    ];

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    
}


