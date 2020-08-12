<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    public $table="classification";

    public function books()
    {
        return $this->hasMany('App\Books'); 
    }
}
