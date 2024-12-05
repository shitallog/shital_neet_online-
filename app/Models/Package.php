<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{


    use HasFactory;

    protected $fillable = [
        'user_id', 
        'package_id', 
     ];

    public function packages()
{
    return $this->belongsToMany(TestSeriesPackage::class);
}



}
