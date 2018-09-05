<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Consult extends Model
{
    protected $fillable  = ['consult_id', 'telephone', 'city', 'area', 'position', 'description'];

    public function consult(){
        return $this->belongsTo('App\Models\User', 'consult_id','id');
    }

    public function timeConsult(){
        return $this->hasMany('App\Models\TimeConsultation', 'consults_id');
    }
}
