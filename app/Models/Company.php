<?php
/**
 * Created by PhpStorm.
 * User: Quicks
 * Date: 14.06.2015
 * Time: 14:42
 */

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Model;
class Company extends Model {

    protected $table = 'company';
    public function ReadCompany()
    {
        //$company = DB::table('company');
        $company = DB::select('SELECT * FROM company Where 1');
        return $company;
        //$nameCompany = $company[2];
        //$_POST['company'] = $nameCompany;
        //return $company;
        //dd($company);
        //$companyTable = DB::table();
        //$posts = Vacancy::all();
        //dd($posts);
    }
    public function createCompany($array)                                                                               //создание компании
    {
        //setcookie('color','white');
        $date = new\DateTime();
        $companyId = 10;
        $companyName = $array[1];
        $companyEmail = $array[2];

        $hasCompany = DB::select('SELECT company_name FROM company Where company_id = ?',array($companyName) );         //проверка на совпадение имен

        if($hasCompany!=null)                                                                                           //если уже есть такая компания
        {
            setcookie('regCompany',"Компанія з таким ім'ям вже зареєстрована");
            return false;
        }
        else{                                                                                                           //если нет такой компании
        DB::table('company')->insert(
            array(
                'company_id' => $companyId,
                'company_name' => $companyName,
                'company_email' => $companyEmail,
                'created_at' => $date,
                'updated_at' => $date
            )

        );
            return true;
            //setcookie('regCompany',"Компанія зареєстрована") ;

        }
    }
    public function hasCompany($array)
    {
        $companyName = $array[0];

        $hasCompany = DB::select('SELECT company_id FROM company WHERE company_id = ?',array($companyName));
        //dd($hasCompany);
        if($hasCompany)return true;
        else return false;
    }

}