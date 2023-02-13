<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\AbstractAuth\Auth\ConfirmablePasswordController as AbstractConfirmablePasswordController;

class ConfirmablePasswordController extends AbstractConfirmablePasswordController
{    
    /**
     * viewPrefix
     *
     * @var string
     */
    private $viewPrefix = 'admin.';   

    /**
     * guard
     *
     * @var string
     */
    private $guard = 'admin';    

    /**
     * routeNamePrefix
     *
     * @var string
     */
    private $routeNamePrefix = 'admins.';
   
    /**
     * Get the value of viewPrefix
     * @return string
     */
    public function getViewPrefix() :string
    {
        return $this->viewPrefix;
    }

    /**
     * Set the value of viewPrefix
     *      
     * @param  string  $viewPrefix  viewPrefix
     * 
     * @return void
     */
    public function setViewPrefix(string $viewPrefix) :void
    {
        $this->viewPrefix = $viewPrefix;
    }

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
     * @param  string  $routeNamePrefix  routeNamePrefix
     * 
     * @return void
     */
    public function setRouteNamePrefix(string $routeNamePrefix): void
    {
        $this->routeNamePrefix = $routeNamePrefix;
    }
}
