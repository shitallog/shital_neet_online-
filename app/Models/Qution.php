<?php

namespace App\Models;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qution extends Model
{
    use HasFactory;


    protected $fillable = [
        'subject_id', 'price' 
    ];


    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }


    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }


}
