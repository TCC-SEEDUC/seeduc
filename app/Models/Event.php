<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
    #One to One relationships

    #One to Many relationships
    
    public function activities(){
        return $this->hasMany('App\Models\Activity');
    }

    #Many to Many relationships

}
