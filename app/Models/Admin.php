<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model implements MustVerifyEmail
{
    use HasFactory;
        
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password', 
        'phone',
        'status',
        'remember_token'
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

}
