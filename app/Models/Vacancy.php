<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Vacancy extends Model {


    protected $table = 'vacancies';
    protected $fillable = ['position','company_id','branch','organisation', 'date_field', 'salary','city', 'description','user_email'];


    public function getVacancies()
    {

        //return $this->latest()->get();
    }

    public function ReadCompany()
    {

    }

    public function CreateVacancy($array)
    {

        $position = $array['position'];
        $galuz = $array['galuz'];
        $organisation = $array['organisation'];
        $date = $array['date'];
        $salary = $array['salary'];
        $city = $array['city'];
        $description = $array['description'];

        DB::table('vacancies')->insert(
            array(
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
