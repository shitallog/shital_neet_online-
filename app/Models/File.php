<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'path','uploaded_at'];


    public $timestamps = false; // Disable default timestamps

    // Define the custom timestamp column
    protected $dates = ['uploaded_at'];
}
