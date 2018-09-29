<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    #One to One relationships

    public function shedule(){
        return $this->belongsTo('App\Models\Shedule');
    }

    public function event(){
        return $this->belongsTo('App\Models\Event');
    }

    public function location(){
        return $this->belongsTo('App\Models\Location');
    }

    public function room(){
        return $this->belongsTo('App\Models\Room');
    }

    public function schedule(){
        return $this->belongsTo('App\Models\Schedule');
    }

    #One to Many relationships
    
    public function subscriptions(){
        return $this->hasMany('App\Models\Subscription');
    }

    #Many to Many relationships

    public function bonds(){
        return $this->belongsToMany('App\Models\Bond', 'activity_id', 'bond_id');
    }

    public function speakers(){
        return $this->belongsToMany('App\Models\Speaker', 'activity_id', 'speaker_id');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User', 'subscriptions', 'activity_id', 'user_id');
    }

    public function feedbacks(){
        return $this->belongsToMany('App\Models\Feedback', 'activity_id', 'feedback_id');
    }

}
