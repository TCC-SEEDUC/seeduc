<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackQuiz extends Model
{
    #Many to One relationships
    public function usersFeedback(){
        return $this->belongsToMany('App\Models\UsersFeedback');
    }
}
