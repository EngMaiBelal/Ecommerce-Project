<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable= [
        'name',
        'status'
    ];
        
    /**
     * products relationship ( each category has many product )
     *
     * @return void
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
