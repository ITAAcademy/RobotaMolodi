<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model {

    protected $perPage = 5;
    protected $table = "resumes";
    protected $fillable = ['position','telephone','email', 'name_u', 'industry', 'salary', 'salary_max', 'currency_id', 'city', 'description','published'];

    public function getResumes()
    {
        $resumes = $this->latest('id')->get();//Беремо із бази всі дані і сортуємо за спаданням по id
        return $resumes;
    }

    private function BelongsUser()
    {
        $user = $this->belongsTo('App\Models\User','id_u')->first();
        return $user;
    }
    public function ReadUser()
    {
        $user = $this->BelongsUser();

        return $user;
    }

    public function fillResume($id,$auth,$request)
    {

        $name_u = $request['name_u'];
        $telephone = $request['telephone'];
        $email = $request['email'];
        $city = $request['city'];
        $industry = $request['industry'];
        $position = $request['position'];
        $salary = $request['salary'];
        $salary_max = $request['salary_max'];
        $currency_id = $request['currency_id'];
        $description = $request['description'];
        $published = $request['published'];
        if ($salary_max == '')
            $salary_max =0;
        if($salary > 1000000000){
            $salary = 1000000000;
        }

        if($salary_max > 1000000000){
            $salary_max = 1000000000;
        }

        if($salary_max < $salary && $salary_max !=0){
          $sal = $salary_max;
          $salary_max = $salary;
          $salary = $sal;
        }

        if($id!=0)
        {
            $resume = Resume::find($id);
            $user = $resume->ReadUser();
            $resume->id_u = $user->id;

        }
        else
        {
            $user = $auth->user();
            $resume = new Resume();
            $resume->id_u = $user->id;
        }

        $resume->name_u = $name_u;
        $resume->telephone = $telephone;
        $resume->email = $email;
        $resume->city = $city;
        $resume->industry = $industry;
        $resume->position = $position;
        $resume->salary = $salary;
        $resume->salary_max = $salary_max;
        $resume->currency_id = $currency_id;
        $resume->description = $description;
        $resume->published = $published;
        return $resume;

    }
    public function Cities()
    {
        $this->belongsTo('App\Models\City')->get();
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Scopes
    public function scopeCity()
    {
        $city = $this->hasOne('App\Models\City','id','city')->first();

        return $city;
    }

    public function scopeIndustry()
    {
        $industry = $this->hasOne('App\Models\Industry','id','industry')->first();

        return $industry;
    }

    public function Currency()
    {
        $currencies =  $this->belongsTo('App\Models\Currency', 'currency_id')->get();
        return $currencies;
    }

    public function scopeByIndustries($query, $industries)
    {
        if (!empty($industries)) {
            return $query->whereIn('industry', $industries);
        }else{
            return $query;
        }
    }

    public function scopeByRegions($query, $regions){
        if (!empty($regions)) {
            return $query->whereIn('city', $regions);
        }else{
            return $query;
        }
    }

    public function scopeBySpecialisations($query, $specialisations){
        if (!empty($specialisations)) {
            return $query->whereIn('position', $specialisations);
        }else{
            return $query;
        }
    }

    public function scopeBySort($query, $order){
        return $query->orderBy('updated_at', $order);
    }

    public function scopeByStartDate($query, $date)
    {
        if (!empty($date)) {
            return $query->where('updated_at','>=',$date);
        }else{
            return $query;
        }
    }

    public function scopeByEndDate($query, $date)
    {
        if (!empty($date)) {
            $date = $date.' 23:59:59';
            return $query->where('updated_at','<=',$date);
        }else{
            return $query;
        }
    }
}
