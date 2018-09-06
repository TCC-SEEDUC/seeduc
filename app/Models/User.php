<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
    * This class manages the relations beetwen users and the other classes
    * Different of the User class in the App\User namespace which just make the autentication
    */

    #One to One relationships

    #One to Many relationships

    public function quizzes(){
        return $this->hasMany('App\Models\Quiz');
    }

    #Many to Many relationships

    public function roles(){
        //Decide if user will have multiple roles in different events
        return $this->belongsToMany('App\Models\UsersRole','user_id','role_id');
    }
    
    /**
    * Brings the activities where the user had made subscription
    */ 
    public function activities(){
        return $this->belongsToMany('App\Models\Subscription', 'user_id', 'activity_id');
    }

    public function feedbacks(){
        return $this->belongsToMany('App\Models\UsersFeedback', 'user_id', 'feedback_id');
    }

}
