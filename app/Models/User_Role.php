<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_Role extends Model
{
    public function User(){
        return $this->hasMany('App\Models\User');
    }
}
