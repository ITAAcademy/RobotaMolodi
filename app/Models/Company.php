<?php
/**
 * Created by PhpStorm.
 * User: Quicks
 * Date: 14.06.2015
 * Time: 14:42
 */

namespace App\Models;

//use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use DB;
use Eloquent;

class Company extends Eloquent {

    protected $table = 'company';
    protected $fillable = ['company_name','company_email','users_id', 'created_at', 'updated_at'];

    public function CheckUserCompany()
    {
        //return User::where('id',$this->users_id)->first();
        return $this->belongsTo('App\Models\User');

    }

    public function Vacancies()
    {
        return $this->hasMany('App\Models\Vacancy');
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
        dd($hasCompany);
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
        $company = DB::select('select id from company where company_name = ?', [$name]);
        //dd($company);
        //$company = $this->latest('id')->get();
        //dd($company[0]);
        return $company;
    }

    public function getUserVacancies()
    {
        $vacancies = $this->hasMany('App\Models\Vacancy','company_id')->get();

        return $vacancies;//$this->hasMany('App\Models\Vacancy','company_id')->get();
    }
}

