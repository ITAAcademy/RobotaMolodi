<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeConsultation extends Model
{
    public $timestamps = false;

    protected $fillable = ['consults_id', 'time_start', 'time_end'];

    public function consults(){
        return $this->belongsTo('App\Models\Consult');
    }
    public function confirmedConsultations(){
        return $this->hasMany('App\Models\ConfirmedConsultation', 'time_consultation_id');
    }
}
