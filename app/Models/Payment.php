<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // The table associated with the model
    protected $table = 'payments';

    // The attributes that are mass assignable
    protected $fillable = [
        'user_id', 
        'transaction_id', 
        'amount', 
        'status', 
        'payment_method',
    ];

    // The attributes that should be hidden for arrays
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    // Define the relationship with the User model (assuming a User has many payments)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
