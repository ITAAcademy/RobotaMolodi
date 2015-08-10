<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model {

    protected $table = "resumes";
    protected $fillable = ['position','telephone','email', 'name_u', 'industry', 'salary','city', 'description'];

    public function getResumes()
    {
        $resumes = $this->latest('id')->get();//Беремо із бази всі дані і сортуємо за спаданням по id
        return $resumes;
    }

    private function BelongsUser()
    {
        $user = $this->belongsTo('App\Models\User','id_u')->get();

        return $user[0];
    }
    public function ReadUser()
    {
        $user = $this->BelongsUser();

        return $user;
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
        $description = $request['description'];

        if($id!=0)
        {
            $user = Resume::GetUser();
            $resume = Resume::find($id);
            $resume->id_u = $user->id;

        }
        else
        {
            $user = $auth->user();
            $resume = new Resume();
            $resume->id_u = $user->id;
        }

        $resume->name_u = $name_u;
        $resume->telephone = $telephone;
        $resume->email = $email;
        $resume->city = $city;
        $resume->industry = $industry;
        $resume->position = $position;
        $resume->salary = $salary;
        $resume->description = $description;

        return $resume;

    }
}
