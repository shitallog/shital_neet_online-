<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Student extends Authenticatable implements AuthenticatableContract
{
    use HasFactory, Notifiable;

    protected $table = 'students';
    
    protected $fillable = [
        'name',
        'email',
        'dob',
        'gender',
        'father_name',
        'mother_name',
        'category',
        'username',
        'password',
        'course',
        'profile_picture',
        'reference',
        'cash'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

   /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isStudent()
    {
        return true; // This method will always return true because it's in the Student model
    }
}
