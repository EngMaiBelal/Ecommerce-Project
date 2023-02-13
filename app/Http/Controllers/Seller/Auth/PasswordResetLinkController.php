<?php

namespace App\Http\Controllers\Seller\Auth;

use App\Http\Controllers\AbstractAuth\Auth\PasswordResetLinkController as AbstractPasswordResetLinkController;

class PasswordResetLinkController extends AbstractPasswordResetLinkController
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
