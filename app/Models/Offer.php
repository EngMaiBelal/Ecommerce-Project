<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'max_discount',
        'start_date',
        'end_date',
    ];
      
    /**
     * offer_product relationship (Many to Many)
     *
     * @return void
     */
    public function products(){
        return $this->belongsToMany(Product::class,'offer_product','product_id','offer_id')
        ->withPivot('discount', 'price_after_discount');
    } 
}
