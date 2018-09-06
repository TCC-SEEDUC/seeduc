<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    #One to One relationships

    #One to Many relationships

    #Many to Many relationships

    public function users(){
        return $this->belongsToMany('App\Models\UsersRole','role_id', 'user_id');
    }
}
