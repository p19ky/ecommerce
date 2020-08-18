<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $table="cart";

    public function users()
    {
        return $this->hasMany('App\User'); 
    }
}
