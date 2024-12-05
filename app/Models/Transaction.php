<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_id',
        'order_id',
        'amount',
        'status',
        'transaction_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
