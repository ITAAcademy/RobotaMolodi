<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Resume extends Model {

    protected $perPage = 5;
    protected $table = "resumes";
    protected $fillable = ['position','telephone','email', 'name_u', 'industry', 'salary', 'salary_max', 'currency_id', 'city', 'description','published'];

    public function rates(){
       return $this->hasMany('App\Models\Rating', 'object_id', 'id')->where('object_type', substr($this->table, 0, 3));
    }
    public function consult(){
        return $this->hasOne('App\Models\Consult', 'resume_id', 'id');
    }

    public function rated(){
        return new Rating();
    }
    public function getResumes()
    {
        $resumes = $this->latest('id')->get();//Беремо із бази всі дані і сортуємо за спаданням по id
        return $resumes;
    }

    public function ReadUser()
    {
        return $this->user;
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
            $resume->user_id = $user->id;

        }
        else
        {
            $user = $auth->user();
            $resume = new Resume();
            $resume->user_id = $user->id;
        }

        $resume->name_u = $name_u;
        $resume->telephone = $telephone;
        $resume->email = $email;
        $resume->city_id = $city;
        $resume->industry_id = $industry;
        $resume->position = $position;
        $resume->salary = $salary;
        $resume->salary_max = $salary_max;
        $resume->currency_id = $currency_id;
        $resume->description = $description;
        $resume->published = $published;
        return $resume;

    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }

    public function industry()
    {
        return $this->belongsTo('App\Models\Industry', 'industry_id');
    }

    public function currency()
    {
        return  $this->belongsTo('App\Models\Currency', 'currency_id');
    }

    public function scopeAllResumes()
    {
        $vacancies = $this->latest('updated_at');

        return $vacancies;
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

    public function scopeByRating($query, $order){
        if($order == 'drop'){
            return $query;
        }
        return $query->select('resumes.*')
            ->leftjoin('ratings', function($join){
                $join->on('ratings.object_id', '=', 'resumes.id')
                    ->where('object_type', '=', substr($this->table, 0, 3));
            })
            ->groupBy('resumes.id')
            ->orderBy(DB::raw('sum(ifnull(ratings.value, 0))'), $order);
    }

    public function scopeBySort($query, $order){
        if($order == 'drop'){
            return $query;
        }
        return $query->orderBy('resumes.updated_at', $order);
    }

    public function scopeByStartDate($query, $date)
    {
        if (!empty($date)) {
            return $query->where('resumes.updated_at','>=',$date);
        }else{
            return $query;
        }
    }

    public function scopeByEndDate($query, $date)
    {
        if (!empty($date)) {
            $date = $date.' 23:59:59';
            return $query->where('resumes.updated_at','<=',$date);
        }else{
            return $query;
        }
    }

    public function scopeCheckNoAccess($query){
        $res = $this->isActive();
        if(Auth::check()){
            $user = auth()->user();
            if($user->isAdmin()){
                $res = $query;
            }else{
                $res = $res->orWhere('user_id','=',$user->id);
            }
        }
        return $res;
    }

    public function scopeIsActive($query){
        return $query->where('published','!=',0);
    }

}
