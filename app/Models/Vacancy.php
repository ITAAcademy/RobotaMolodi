<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class Vacancy extends Model {

    protected $perPage = 4;
    protected $table = 'vacancies';
    protected $fillable = ['id','position','company_id','branch', 'date_field', 'salary', 'salary_max', 'currency_id' ,'city', 'description','user_email', 'updated_at', 'published'];

    public function rates(){
        return $this->hasMany('App\Models\Rating', 'object_id', 'id')->where('object_type', substr($this->table, 0, 3));
    }

//Read and return company
    public function ReadCompany()
    {
        $company = $this->belongsTo('App\Models\Company','company_id')->first();

        return $company;
    }

    public function Company(){
        return $this->belongsTo('App\Models\Company');
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
        $published = $request['published'];
        if($id!=0)
        {
            $vacancy = Vacancy::find($id);
        }
        else
        {
            $vacancy = new Vacancy();
        }

        $vacancy->position = strip_tags($position);
        $vacancy->branch = $branch;
        //$vacancy->telephone = $telephone;
        $vacancy->salary = $salary;
        $vacancy->salary_max = $salary_max;
        $vacancy->currency_id = $currency_id;
        $vacancy->description = $description;
        $vacancy->company_id = $companyId;
        $vacancy->user_email = $userEmail;
        $vacancy->published = $published;
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
        return $this->belongsToMany('App\Models\City','vacancy_city');

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


    public function scopeByIndustries($query,$industries)
    {
        if (!empty($industries)) {
            return $query->whereIn('branch', $industries);
        }else{
            return $query;
        }
    }

    public function scopeByRegions($query,$regions){
        if(!empty($regions)){
            return $query->whereHas('Cities', function($q) use ($regions) {
                $q->whereIn('vacancy_city.city_id',$regions);
            });
        }else{
            return $regions;
        }
    }

    public function scopeBySpecialisations($query,$specialisations){
        if (!empty($specialisations)) {
            return $query->whereIn('position', $specialisations);
        }else{
            return $query;
        }
    }

    public function scopeBySort($query, $order){
        return $query->orderBy('updated_at', $order);
    }
    public function scopeOrderByDate($query){
        return $query->orderBy('updated_at', 'desc');
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
//    public function scopeCheckNoAccess($query){
//        $res = $this->isActive();
//
//        if(Auth::check()){
//            $user = auth()->user();
//            if($user->isAdmin()){
//                $res = $query;
//            }else{
//                $comId = $this->userVacancies($user)->get()->pluck('id');
//                $res = $res->orWhereIn('vacancies.company_id',$comId->toArray());
//            }
//        }
//        return $res;
//
//    }

    public function scopeIsActive($query){
        return $query->where('published','!=',0);
    }

    public function scopeUserVacancies($query, $user){
        $query = Company::where('users_id','=',$user->id);
        return $query;
    }
}