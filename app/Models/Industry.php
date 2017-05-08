<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model {

    protected $table = 'industries';
    protected $fillable = ['name'];
// Get all industries order by name
    public function getIndustries()
    {
        $industries = $this->orderBy('name')->get();
        $indTmp = array();
        foreach ($industries as $industry){
            if($industry->name == 'Інформаційні технології'){
                array_unshift($indTmp, $industry);
            }else{
                array_push($indTmp, $industry);
            }
        }
        return $indTmp;
    }
    public function GetVacancies()
    {
        return $this->hasMany('App\Models\Vacancy','branch')->latest('updated_at');
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////
    //Scopes

    public function scopeName()
    {
        return $this;
    }
}
