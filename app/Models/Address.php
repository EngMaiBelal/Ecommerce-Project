<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    
    protected $fillable= [
        'street',
        'notes',
        'building',
        'floor',
        'flat',
        'type'
    ];  

    /**
     * user relation between user & address (each address has one user)
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * region relation between region & address (each address has one region)
     *
     * @return void
     */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }    
    /**
     * orders relation between orders & address (each address has many order)
     *
     * @return void
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
