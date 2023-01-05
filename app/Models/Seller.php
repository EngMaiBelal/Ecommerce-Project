<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seller extends Model implements MustVerifyEmail
{
    use HasFactory;
        
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable =[
        'name',
        'shope_name',
        'email',
        'password',
        'phone',
        'status',
        'verification_code',
        'email_verified_at',
        'phone_verified_at',
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * products
     *
     * @return void
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
