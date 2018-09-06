<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    #One to One relationships

    public function bond(){
        return $this->belongsTo('App\Models\Bond');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
    #One to Many relationships

    #Many to Many relationships
}
