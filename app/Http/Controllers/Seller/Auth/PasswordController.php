<?php

namespace App\Http\Controllers\Seller\Auth;

use App\Http\Controllers\AbstractAuth\Auth\PasswordController as AbstractPasswordController;

class PasswordController extends AbstractPasswordController
{
    /**
     * guard
     *
     * @var string
     */
    private $guard = 'seller';    

    /**
     * Get the value of guard
     * 
     * @return string
     */
    public function getGuard():string
    {
        return $this->guard;
    }

    /**
     * Set the value of guard
     *      
     * @param  string  $guard  guard
     * 
     * @return void
     */
    public function setGuard(string $guard): void
    {
        $this->guard = $guard;
    }
}
