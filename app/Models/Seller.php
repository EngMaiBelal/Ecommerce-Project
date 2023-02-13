<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Traits\SendEmailVerificationNotification;
use App\Traits\SendPasswordResetNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Seller extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable
    ,SendEmailVerificationNotification, 
    SendPasswordResetNotification;   
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable =[
        'name',
        'shop_name',
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
