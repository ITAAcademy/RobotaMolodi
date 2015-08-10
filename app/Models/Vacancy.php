<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Session;

class Vacancy extends Model {


    protected $table = 'vacancies';
    protected $fillable = ['position','company_id','branch','organisation', 'date_field', 'salary','city', 'description','user_email'];


    public function ReadCompany()
    {
        $company = $this->belongsTo('App\Models\Company','company_id')->get();

        return $company[0];
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

    public function fillVacancy($id,$auth,$company,$request)
    {

        $position = $request['Position'];
        $branch = $request['branch'];
        $organisation = $request['Organisation'];
        $salary = $request['Salary'];
        $city = $request['City'];
        $description = $request['Description'];
        $userEmail = $request['user_email'];

        $companyId = $company->companyName($organisation);

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
        $vacancy->organisation = $organisation;
        $vacancy->salary = $salary;
        $vacancy->city = $city;
        $vacancy->description = $description;
        $vacancy->company_id = $companyId->id;
        $vacancy->user_email = $userEmail;

        return $vacancy;
    }
	//

    public function ReadUser($id)
    {
        $vacancy = Vacancy::find($id);
        $comp = $vacancy->ReadCompany();
        $user = $comp->ReadUser();
        return $user;
    }
}
