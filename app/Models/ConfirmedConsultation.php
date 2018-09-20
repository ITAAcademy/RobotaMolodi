<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfirmedConsultation extends Model
{
    //
    protected $fillable = ['time_consultation_id', 'user_id'];

    public function timeConsultation(){

        return $this->belongsTo('App\Models\TimeConsultation', 'time_consultation_id');
    }
    public function user(){
        return $this->belongsTo('App\Models\Consult', 'user_id','consult_id');
    }
    public function consultant(){
        return $this->hasManyThrough('App\Models\Consult', 'App\Models\TimeConsultation',
            'consults_id','consult_id','time_consultation_id');
    }
}
