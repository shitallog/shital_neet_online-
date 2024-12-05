<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestSeriesPackage extends Model
{
    use HasFactory;

    protected $fillable = ['package_name', 'image', 'price', 'original_price', 'year'];




    public function users()
    {
        return $this->belongsToMany(User::class, 'packages');
    }

}
