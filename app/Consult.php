<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    public function consult(){
        return $this->belongsTo('App\User', 'consult_id','id');
    }
}
