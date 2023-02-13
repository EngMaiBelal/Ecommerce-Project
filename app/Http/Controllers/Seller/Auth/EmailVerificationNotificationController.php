<?php

namespace App\Http\Controllers\Seller\Auth;

use App\Http\Controllers\AbstractAuth\Auth\EmailVerificationNotificationController as AbstructEmailVerificationNotificationController;

class EmailVerificationNotificationController extends AbstructEmailVerificationNotificationController
{
    /**
     * guard
     *
     * @var string
     */
    private $guard = 'seller';    

    /**
     * routeNamePrefix
     *
     * @var string
     */
    private $routeNamePrefix = 'sellers.';

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
     * @return void
     */
    public function setGuard(string $guard): void
    {
        $this->guard = $guard;
    }

    /**
     * Get the value of routeNamePrefix
     * 
     * @return string
     */
    public function getRouteNamePrefix() :string
    {
        return $this->routeNamePrefix;
    }

    /**
     * Set the value of routeNamePrefix
     * 
     * @return void
     */
    public function setRouteNamePrefix(string $routeNamePrefix): void
    {
        $this->routeNamePrefix = $routeNamePrefix;
    }
}
