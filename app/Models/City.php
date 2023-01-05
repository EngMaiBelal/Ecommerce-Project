<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
        
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'status'
    ];
        
    /**
     * regions relationship (each city has many regions)
     *
     * @return void
     */
    public function regions()
    {
        return $this->hasMany(Region::class);
    }
}
