<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    #One to One relationships

    #One to Many relationships

    public function activities(){
        return $this->hasMany('App\Models\Activity');
    }
    public function rooms(){
        return $this->hasMany('App\Models\Room');
    }
    
    #Many to Many relationships
}
