<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    protected $fillable  = ['user_id', 'telephone', 'city', 'area', 'position', 'description', 'currency_id', 'resume_id', 'value'];
    protected $table = "consults";

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id','id');
    }

    public function timeConsults(){
        return $this->hasMany('App\Models\TimeConsultation', 'consults_id');
    }
//    public function confirmedConsultations(){
//        return $this->hasManyThrough('App\Models\ConfirmedConsultation', 'App\Models\TimeConsultation',
//            'consults_id', 'time_consultation_id');
//    }
    public function resume(){
        return $this->belongsTo('App\Models\Resume', 'resume_id','id');
    }
    public function currency()
    {
        return  $this->belongsTo('App\Models\Currency', 'currency_id');
    }
    public function rates(){
        return $this->hasMany('App\Models\Rating', 'object_id', 'id')->where('object_type', substr($this->table, 0, 3));
    }
    public function rated(){
        return new Rating();
    }
      
    public function userName(){
        return $this->user->name;
    }
    public function scopeByIndustries($query, $industries)
    {
        if (!empty($industries)) {
            return $query->whereIn('industry_id', $industries);
        }else{
            return $query;
        }
    }

    public function scopeByRegions($query, $regions){
        if (!empty($regions)) {
            return $query->whereIn('city_id', $regions);
        }else{
            return $query;
        }
    }

    public function scopeBySpecialisations($query, $specialisations){
        if (!empty($specialisations)) {
            $specialisations = Vacancy::where('position', $specialisations)->get()->pluck('consultant_id')->toArray();
            return $query->whereIn('consultant.id', $specialisations);
        }else{
            return $query;
        }
    }
    public function scopeByRating($query, $order){

        if($order == 'drop'){
            return $query;
        }
        return  $query->select('consultant.*')
            ->leftjoin('ratings', function($join){
                $join->on('ratings.object_id', '=', 'consultant.id')
                    ->where('object_type', '=', substr($this->table, 0, 3));
            })
            ->groupBy('consultant.id')
            ->orderBy(DB::raw('sum(ifnull(ratings.value, 0))'), $order);
    }
    public function scopeBySort($query, $order){
        if($order == 'drop'){
            return $query;
        }
        return $query->orderBy('consultant.updated_at', $order);
    }

    public function scopeGetConsult($query, $vac){
        return $query->whereIn('consultant.id', $vac);
    }

    public function scopeByStartDate($query, $date)
    {
        if (!empty($date)) {
            return $query->where('consultant.updated_at','>=',$date);
        }else{
            return $query;
        }
    }

    public function scopeByEndDate($query, $date)
    {
        if (!empty($date)) {
            $date = $date.' 23:59:59';
            return $query->where('consultant.updated_at','<=',$date);
        }else{
            return $query;
        }
    }
    public function scopeOrderByDate($query){
        return $query->orderBy('updated_at', 'desc');
    }

    public function currencyName()
    {
        return $this->currency->currency;
    }
}

