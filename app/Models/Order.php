<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'delivered_date',
        'total_price',
        'final_price',
        'status',
    ];
    
    /**
     * payment relationship (each order has one payment) (one to many)
     *
     * @return void
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    /**
     * products relationship order_product (many to many)
     *
     * @return void
     */
    public function products()
    {
        return $this->belongsToMany(product::class,'order_product','product_id','order_id')
        ->withPivot('discount', 'price', 'quantity');
    }

    /**
     * orders relationship (each coupon has many orders)
     *
     * @return void
     */
    public function coupon(){
        return $this->belongsTo(Coupon::class);  
    } 
    
    /**
     * address relationship between (user & order) (each address has one order)(one to many)
     *
     * @return void
     */
    public function address(){
        return $this->belongsTo(Address::class);  
    } 
}
