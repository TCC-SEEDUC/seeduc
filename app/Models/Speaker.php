<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    #One to One relationships

    #One to Many relationships

    #Many to Many relationships

    public function activities(){
        return $this->belongsToMany('App\Models\ActivitySpeaker', 'activity_id', 'speaker_id');
    }

}
