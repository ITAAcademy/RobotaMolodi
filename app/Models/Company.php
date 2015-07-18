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
use DB;
use Eloquent;

class Company extends Eloquent {

    protected $table = 'company';
    protected $fillable = ['company_name','company_email','users_id', 'created_at', 'updated_at'];

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
        return $this->belongsTo('company_name');
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
        //dd($id);
        $companyName = $id;

        $hasCompany = DB::select('SELECT id FROM company WHERE id = ?',$companyName);
        dd($hasCompany);
        if($hasCompany)return true;
        else return false;
    }

    public function CountCompany($id)
    {
        $countCompany = DB::select('SELECT company_name FROM company WHERE id = ?',array($id));

        if($countCompany) return $countCompany;

        else return false;
    }
    public function companyName($name)
    {
        $company = DB::select('select id from company where company_name = ?', [$name]);
        //dd($company);
        return $company;
    }
}

