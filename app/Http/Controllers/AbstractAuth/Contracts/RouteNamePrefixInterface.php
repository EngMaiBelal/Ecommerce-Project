<?php
namespace App\Http\Controllers\AbstractAuth\Contracts;

interface RouteNamePrefixInterface{
    
    /**
     * setRouteNamePrefix
     *
     * @param  mixed $route
     * @return void
     */
    
    public function setRouteNamePrefix(string $route):void; 

    /**
     * getRouteNamePrefix
     *
     * @return string
     */

    public function getRouteNamePrefix():string;    
}
