<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersFeedback extends Model
{
    #Many to One relationships 
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function feedbackQuiz(){
        return $this->belongsTo('App\Models\FeedbackQuiz');
    }
}
