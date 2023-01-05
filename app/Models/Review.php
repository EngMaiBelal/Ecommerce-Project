<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
        
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'comment',
        'rate'
    ];
    
    /**
     * product review relationship between product and user
     *  many to many Relation
     *  without composit id
     *
     * @return void
     */
    public function product(){
        return $this->belongsTo(Product::class);
    }
    
    /**
     * user review relationship between product and user
     *  many to many Relation
     *  without composit id
     *
     * @return void
     */
    public function user(){
        return $this->belongsTo(User::class);
    
    }
    
    
}
