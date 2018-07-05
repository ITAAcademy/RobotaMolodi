<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    public function consults(){
        return $this->belongsTo('App\User', 'consult_id','id');
    }
}
