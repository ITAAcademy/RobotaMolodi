<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfirmedConsultation extends Model
{
    //
    protected $fillable = ['time_consultation_id', 'user_id'];

    public function timeConsultation(){

        return $this->belongsTo('App\Models\TimeConsultation', 'time_consultation_id','id');
    }
    public function user(){
        return $this->belongsTo('App\Models\Consult', 'user_id','consult_id');
    }
}
