<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    #One to One relationships
    public function activity(){
        return $this->belongsTo('App\Models\Activity');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    #One to Many relationships
    
    #Many to Many relationships
}
