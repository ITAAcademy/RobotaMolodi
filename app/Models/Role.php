<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ADMIN = 1;
    const USER = 2;

    protected $table = 'roles';

    public function user(){
        return $this->hasMany('App\Models\User');
    }
}
