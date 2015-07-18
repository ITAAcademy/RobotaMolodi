<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Vacancy extends Model {


    protected $table = 'vacancies';
    protected $fillable = ['position','company_id','branch','organisation', 'date_field', 'salary','city', 'description'];



    public function ReadCompany()
    {

    }

    public function CreateVacancy($array)
    {

        //$company_id = 13;
        $position = $array['position'];
        $galuz = $array['galuz'];
        $organisation = $array['organisation'];
        $date = $array['date'];
        $salary = $array['salary'];
        $city = $array['city'];
        $description = $array['description'];
       // $remember = rememberToken();
       // $time = timestamps();

        DB::table('vacancies')->insert(
            array(
                //'company_id' => $company_id,
                'position' => $position,
                'branch' => $galuz,
                'organisation' => $organisation,
                'salary' => $salary,
                'city' => $city,
                'description' => $description,
                'date_field' => $date,
                'created_at' => $date,
                'updated_at' => $date
            )

        );

    }

	//


}
