<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Traits\SendEmailVerificationNotification;
use App\Traits\SendPasswordResetNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable
    ,SendEmailVerificationNotification, 
    SendPasswordResetNotification;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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
     * addresses (each user has many addresses)(one to many)
     *
     * @return void
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
    
    /**
     * favs (many to many)
     *
     * @return void
     */
    public function favs()
    {
        return $this->belongsToMany(Product::class,'favs','user_id','product_id')->as('favs');
    }
        
    /**
     * reviews (many to many)(without composite id)
     *
     * @return void
     */
    public function reviews(){
        return $this->hasMany(Review::class);
    }  

    /**
     * carts (many to many)
     *
     * @return void
     */
    public function carts(){
        return $this->belongsToMany(Product::class,'carts','user_id','product_id')
        ->as('carts')->withPivot('quantity');
    } 

    /**
     * users relationship (many to many)
     *
     * @return void
     */
    public function coupons(){
        return $this->belongsToMany(Coupon::class, 'coupon_user', 'coupon_id', 'user_id');
    } 
}
