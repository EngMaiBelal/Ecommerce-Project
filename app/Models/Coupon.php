<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'max_usage_number',
        'max_usage_number_per_user',
        'discount',
        'start_date',
        'end_date',
        'code',
        'status',
        'max_discount_value',
        'min_order_value',
    ];
    
    /**
     * users relationship (many to many)
     *
     * @return void
     */
    public function users(){
        return $this->belongsToMany(User::class, 'coupon_user', 'user_id', 'coupon_id');
    } 
    
    /**
     * orders relationship (each coupon has many orders)
     *
     * @return void
     */
    public function orders(){
        return $this->hasMany(Order::class);  
    } 

}
