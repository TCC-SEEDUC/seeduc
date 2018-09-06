<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivitySpeaker extends Model
{
    #Many to One relationships
    public function activity(){
        return $this->belongsTo('App\Models\Activity');
    }
    public function speaker(){
        return $this->belongsTo('App\Models\Speaker');
    }

}
