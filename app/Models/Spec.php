<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

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
