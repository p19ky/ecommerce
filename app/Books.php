<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    public function classification()
    {
        return $this->belongsTo('App\Classification', 'classifId'); 
    }
}
