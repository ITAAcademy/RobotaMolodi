<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model {

    protected $table = 'industries';
    protected $fillable = ['name', 'main'];
// Get all industries order by name
    public function getIndustries()
    {
        $industries = $this->orderBy('name')->get();

        return $industries;
    }
    public function GetVacancies()
    {
        return $this->hasMany('App\Models\Vacancy','branch')->latest('updated_at');
    }

    public function Resumes()
    {
        return $this->hasMany('App\Models\Resumes', 'industry')->getResults();
    }

    public function scopeName()
    {
        return $this;
    }
}
