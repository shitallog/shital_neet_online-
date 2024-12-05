<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolutionFile extends Model
{
    use HasFactory;

    protected $table = 'solution_files';

    protected $fillable = ['name', 'file_path'];
}
