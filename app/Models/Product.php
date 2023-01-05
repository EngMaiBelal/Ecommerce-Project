<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'sale_price',
        'purchase_price',
        'quantity',
        'code',
        'description',
        'status',
        'category_id',
        'seller_id'
    ];
    
    /**
     * favs relationship (many to many) 
     *
     * @return void
     */
    public function favs()
    {
        return $this->belongsToMany(Product::class,'favs','product_id','user_id')->as('favs');
    }  

    /**
     * reviews relationship (many to many)
     *
     * @return void
     */
    public function reviews(){
        return $this->hasMany(Review::class);
    } 
       
    /**
     * carts relationship (many to many)
     *
     * @return void
     */
    public function carts(){
        return $this->belongsToMany(Product::class,'carts','product_id','user_id')
        ->as('carts')->withPivot('quantity');
    }  
      
    /**
     * category relationship ( one to many )
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    } 
       
    /**
     * seller relationship ( one to many )
     *
     * @return void
     */
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    /**
     * offer_product relationship (Many to Many)
     *
     * @return void
     */
    public function offers(){
        return $this->belongsToMany(Offer::class,'offer_product','offer_id','product_id')
        ->withPivot('discount', 'price_after_discount');
    }
    
    /**
     * orders relationship order_product (many to many)
     *
     * @return void
     */
    public function orders()
    {
        return $this->belongsToMany(order::class,'order_product','order_id','product_id')
        ->withPivot('discount', 'price', 'quantity');
    }
    
    /**
     * specs relationship product_spec (many to many)
     *
     * @return void
     */
    public function specs()
    {
        return $this->belongsToMany(Spec::class,'product_spec','spec_id','product_id')
        ->withPivot('value');
    }
}
