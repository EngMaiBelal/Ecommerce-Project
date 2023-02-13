<?php
namespace App\Http\Controllers\AbstractAuth\Contracts;

interface ViewPrefixInterface{
    
    /**
     * setViewPrefix
     *
     * @param  mixed $view
     * @return void
     */
    
    public function setViewPrefix(string $view):void;

    /**
     * getViewPrefix
     *
     * @return string
     */

    public function getViewPrefix():string;    
}
