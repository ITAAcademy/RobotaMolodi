<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    protected $fillable  = ['consult_id', 'telephone', 'city', 'area', 'position', 'description'];

    public function user(){
        return $this->belongsTo('App\Models\User', 'consult_id','id');
    }

    public function timeConsult(){
        return $this->hasMany('App\Models\TimeConsultation', 'consults_id');
    }
    public function confirmedConsultation(){
        return $this->hasManyThrough('App\Models\ConfirmedConsultation', 'App\Models\TimeConsultation',
            'id', 'time_consultation_id', 'consults.consults_id');
    }
    public function resume(){
        return $this->belongsTo('App\Models\Resume', 'resume_id','id');
    }
    public function currency()
    {
        return  $this->belongsTo('App\Models\Currency', 'currency_id');
    }
    public function rated(){
        return new Rating();
    }
      public function rates(){
        return $this->hasMany('App\Models\Rating', 'object_id', 'id')->where('object_type', substr($this->table, 0, 3));
    }
    public function userName(){
        return $this->user->name;
    }
}

