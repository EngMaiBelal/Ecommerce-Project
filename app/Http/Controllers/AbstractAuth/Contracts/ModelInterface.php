<?php
namespace App\Http\Controllers\AbstractAuth\Contracts;

interface ModelInterface{
    
    /**
     * setModel
     *
     * @param  mixed $Model
     * @return void
     */
    
    public function setModel(string $model):void; 

    /**
     * getModel
     *
     * @return string
     */

    public function getModel():string;    
}
