<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model {

    protected $table = 'industries';
    protected $fillable = ['name'];
// Get all industries order by name
    public function getIndustries()
    {
        $industries = $this->orderBy('name')->get();

        return $industries;
    }

    public function topIndustries()
    {
        $industries = $this->where('name', 'Інформаційні технології')->first();
        return $industries;
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
