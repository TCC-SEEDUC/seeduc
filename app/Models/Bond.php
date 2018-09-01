<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bond extends Model
{
    #One to One relationships

    #One to Many relationships
    public function quizzes(){
        return $this->hasMany('App\Models\Quiz');
    }

    #Many to Many relationships
    public function activities(){
        return $this->belongsToMany('App\Models\ActivitiesBond', 'activity_id', 'bond_id');
    }


}
