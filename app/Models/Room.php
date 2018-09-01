<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    #One to One relationships

    public function location(){
        return $this->belongsTO('App\Models\Location');
    }

    #One to Many relationships

    public function activities(){
        return $this->hasMany('App\Models\Activity');
    }
    
    #Many to Many relationships


}
