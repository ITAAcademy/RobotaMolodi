<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model {

    protected $table = "resumes";
    protected $fillable = ['position','telephone','email', 'name_u', 'industry', 'salary', 'salary_max', 'currency_id', 'city', 'description'];

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

        if($salary > 1000000000){
            $salary = 1000000000;
        }

        if($salary_max > 1000000000){
            $salary_max = 1000000000;
        }

        if($salary_max < $salary){
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

        return $resume;

    }
    public function Cities()
    {
        $this->belongsToMany('App\Models\City','resume_city')->get();
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
}
