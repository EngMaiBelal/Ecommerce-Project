<?php

namespace App\Http\Controllers\Seller\Auth;

use App\Http\Controllers\AbstractAuth\Auth\NewPasswordController as AbstractNewPasswordController;

class NewPasswordController extends AbstractNewPasswordController
{   
    /**
     * viewPrefix
     *
     * @var string
     */
    private $viewPrefix = 'seller.';   

    /**
     * broker
     *
     * @var string
     */
    private $broker = 'sellers';    

    /**
     * routeNamePrefix
     *
     * @var string
     */
    private $routeNamePrefix = 'sellers.';
   
    /**
     * Get the value of viewPrefix
     * 
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

    /**
     * Get the value of broker
     *      
     * @return string
     */
    public function getBroker():string
    {
        return $this->broker;
    }

    /**
     * Set the value of broker
     *      
     * @param  string  $broker  broker
     * 
     * @return void
     */
    public function setBroker(string $broker): void
    {
        $this->broker = $broker;
    }
}
