<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory; 
       
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
    ];
    
    /**
     * city relationship ( one to many ) ( each region has one city )
     *
     * @return void
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    
    /**
     * addresses (one to many) (each region has many addresses)
     *
     * @return void
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
