<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivitiesBond extends Model
{
    #Many to One relationships
    public function activity(){
        return $this->belongsTo('App\Models\Activity');
    }  
    public function bond(){
        return $this->belongsTo('App\Models\Bond');
    }
}
