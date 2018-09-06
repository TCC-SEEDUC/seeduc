<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersRole extends Model
{
    #Many to One relationships
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function role(){
        return $this->belongsTo('App\Models\Role');
    }

}
