<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class class12 extends Model
{

    protected $table = 'class12s';

    use HasFactory;
    
    protected $fillable = ['file_name', 'file_path', 'file_type', 'user_id'];
}
