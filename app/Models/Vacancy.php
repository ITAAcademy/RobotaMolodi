<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Session;

class Vacancy extends Model {


    protected $table = 'vacancies';
    protected $fillable = ['id','position','company_id','branch','organisation', 'date_field', 'salary', 'salary_max', 'currency_id' ,'city', 'description','user_email', 'updated_at'];

//Read and return company
    public function ReadCompany()
    {
        $company = $this->belongsTo('App\Models\Company','company_id')->first();

        return $company;
    }

//Fill and return vacancy Model
    public function fillVacancy($id,$request)
    {
        $position = $request['position'];
        $branch = $request['branch'];
        $salary = $request['salary'];
        $salary_max = $request['salary_max'];
        $currency_id = $request['currency_id'];
        //$telephone = $request['telephone'];
        $description = $request['description'];
        $userEmail = $request['email'];
        $companyId = $request['Organisation'];

        if($salary > 1000000000){
            $salary = 1000000000;
        }

        if($salary_max > 1000000000){
            $salary_max = 1000000000;
        }

        if($id!=0)
        {
            $vacancy = Vacancy::find($id);
        }
        else
        {
            $vacancy = new Vacancy();
        }

        $vacancy->position = $position;
        $vacancy->branch = $branch;
        //$vacancy->telephone = $telephone;
        $vacancy->salary = $salary;
        $vacancy->salary_max = $salary_max;
        $vacancy->currency_id = $currency_id;
        $vacancy->description = $description;
        $vacancy->company_id = $companyId;
        $vacancy->user_email = $userEmail;
        return $vacancy;
    }
    //
//Read and return user through company
    public function ReadUser($id)
    {
        $vacancy = Vacancy::find($id);
        $comp = $vacancy->ReadCompany();
        $user = $comp->ReadUser();
        return $user;
    }

    public function Cities()
    {
        return $this->belongsToMany('App\Models\City','vacancy_city')->get();
    }

    ////////////////////////////////////////////////////////////////////////////////
    //Scopes

    public function scopeCompany()
    {
        $company = Vacancy::ReadCompany();

        return $company;
    }

    public function scopeUser()
    {
        $company = $this->belongsTo('App\Models\Company','company_id')->first();
        $user = $company->ReadUser();

        return $user;
    }

    public function scopeIndustry()
    {
        $industry = $this->belongsTo('App\Models\Industry','branch')->first();

        return $industry;
    }

    public function scopeCity()
    {
        $cities = Vacancy::Cities();

        return $cities;
    }

    public function scopeAllVacancies()
    {
        $vacancies = $this->latest('updated_at');

        return $vacancies;
    }

    public function Currency()
    {
        $currencies =  $this->belongsTo('App\Models\Currency', 'currency_id')->get();
        return $currencies;
    }
}