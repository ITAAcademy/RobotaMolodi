<?php
/**
 * Created by PhpStorm.
 * User: Quicks
 * Date: 14.06.2015
 * Time: 14:42
 */

namespace App\Models;

use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use DB;
use Eloquent;
use Illuminate\Support\Facades\Validator;

class Company extends Eloquent {

    protected $perPage = 5;
    protected $table = 'company';
    private $errorsMessages;

    protected $fillable = ['id','company_name','company_email','users_id','created_at', 'updated_at',
        'link','phone', 'description', 'short_name', 'industry_id', 'city_id', ];

    private $rules = array(
        'company_name' => 'required|min:2|max:225',
        'short_name' => 'required|min:2|max:225',
        'company_email' => 'required|email|min:6|max:100',
        'phone' => 'required|min:3|max:13|numeric',
        'link' => 'url|min:12|max:225',
        'description' => 'required|min:10',
        'industry_id' => 'required',
        'city_id' => 'required',
    );
    public function Cities()
    {
        return $this->belongsToMany('App\Models\City','company_city');

    }
    public function getErrorsMessages()
    {
        return $this->errorsMessages;
    }

    public function validateForm($company)
    {
    $validatorCompany = Validator::make($company, $this->rules);
    if ($validatorCompany->fails()) {
        $this->errorsMessages = $validatorCompany->getMessageBag()->setFormat(':message');
        return false;
    }
    return true;
    }

    public function rates(){
        return $this->hasMany('App\Models\Rating', 'object_id', 'id')->where('object_type', substr($this->table, 0, 3));
    }
    //    TODO: need refactor
    public function rated(){
        return new Rating();
    }

    public function ReadUser()
    {
        return $this->belongsTo('App\Models\User','users_id')->first();
    }

    public function Vacancies()
    {
        return $this->hasMany('App\Models\Vacancy');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
    
    public function ReadCompany()
    {

        $company = Company::all();
        return $company;

    }

    public function Many()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function createCompany($array)                                                                               //создание компании
    {
        $date = new\DateTime();

        $usersid = $array["id"];
        $companyName = $array["companyName"];
        $companyEmail = $array["companyEmail"];

        $hasCompany = Company::hasMany($companyName);//DB::select('SELECT company_name FROM company Where company_id = ?',array($companyName) );         //проверка на совпадение имен
        //dd($hasCompany);
        if($hasCompany!=null)                                                                                           //если уже есть такая компания
        {
            return "Компанія з таким ім'ям вже зареєстрована";
        }
        else{                                                                                                           //если нет такой компании
        DB::table('company')->insert(
            array(
                //'id' => $usersid,
                'company_name' => $companyName,
                'company_email' => $companyEmail,
                'created_at' => $date,
                'updated_at' => $date
            )
        );
            return "Компанія зареєстрована";
        }
    }

    public function hasCompany($id)
    {

        $companyName = $id;

        $hasCompany = DB::select('SELECT id FROM company WHERE id = ?',array($companyName));
       // dd($hasCompany);
        if($hasCompany)return true;
        else return false;
    }

    public function CountCompany($id)
    {
        $countCompany = Company::where('users_id',$id)->get();//$this->latest('id')->get();
        //dd($countCompany);
        if($countCompany) return $countCompany;

        else return false;
    }
    public function companyName($name)
    {
        $company = DB::select('select * from company where company_name = ?', [$name]);

        return $company[0];
    }

    public function getUserVacancies()
    {
        $vacancies = $this->hasMany('App\Models\Vacancy','company_id');

        return $vacancies;//$this->hasMany('App\Models\Vacancy','company_id')->get();
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
        $specialisations = Vacancy::where('position', $specialisations)->get()->pluck('company_id')->toArray();
        if (!empty($specialisations)) {
            return $query->whereIn('company.id', $specialisations);
        }else{
            return $query;
        }
    }

    public function scopeByRating($query, $order){

        if($order == 'drop'){
            return $query;
        }
        return  $query->select('company.*')
            ->leftjoin('ratings', function($join){
                $join->on('ratings.object_id', '=', 'company.id')
                    ->where('object_type', '=', substr($this->table, 0, 3));
            })
            ->groupBy('company.id')
            ->orderBy(DB::raw('sum(ifnull(ratings.value, 0))'), $order);
    }

    public function scopeBySort($query, $order){
        if($order == 'drop'){
            return $query;
        }
        return $query->orderBy('company.updated_at', $order);
    }

    public function scopeGetCompany($query, $vac){
        return $query->whereIn('company.id', $vac);
    }

    public function scopeByStartDate($query, $date)
    {
        if (!empty($date)) {
            return $query->where('company.updated_at','>=',$date);
        }else{
            return $query;
        }
    }

    public function scopeByEndDate($query, $date)
    {
        if (!empty($date)) {
            $date = $date.' 23:59:59';
            return $query->where('company.updated_at','<=',$date);
        }else{
            return $query;
        }
    }
    public function scopeOrderByDate($query){
        return $query->orderBy('updated_at', 'desc');
    }
}

