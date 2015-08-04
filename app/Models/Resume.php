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
        return $this->belongsTo('App\Models\User','id_u')->first();
    }
    public function GetUser()
    {
        $user = $this->BelongsUser();
        return $user;
    }

    public function fillResume($id,$auth,$company,$request)
    {

        $name_u = $request['name_u'];
        $telephone = $request['telephone'];
        $email = $request['email'];
        $city = $request['city'];
        $industry = $request['industry'];
        $position = $request['position'];
        $salary = $request['salary'];
        $description = $request['description'];




    }
}
