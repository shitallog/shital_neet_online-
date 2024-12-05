<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class ExamPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'exams', 'payment_type', 'amount', 'description', 'image', 'active'
    ];

    protected $casts = [
        'exams' => 'array', // Automatically decode JSON to array
    ];
}
