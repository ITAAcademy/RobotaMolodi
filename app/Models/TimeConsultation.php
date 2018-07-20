<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeConsultation extends Model
{
    public function consults(){
        return $this->belongsTo('App\Consult');
    }
}
