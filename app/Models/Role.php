<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    public function user(){
        return $this->hasMany('App\Models\User');
    }
}
