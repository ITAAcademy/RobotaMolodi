<?php
/**
 * Created by PhpStorm.
 * User: Quicks
 * Date: 26.08.2015
 * Time: 11:23
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Resume_city extends Model {

    protected $table = 'resume_city';

    protected $fillable = ['resume_id', 'city_id'];

    public function FillHole($cities,$resume_id)
    {
        if(count($cities)<=1)
        {
            $resume_city = new Resume_city();
            $resume_city->city_id = $cities;
            $resume_city->resume_id = $resume_id;
            $resume_city->save();
        }

        else
        {
            foreach($cities as $city)
            {
                $resume_city = new Resume_city();
                $resume_city->city_id = $cities;
                $resume_city->resume_id = $resume_id;
                $resume_city->save();
            }
        }
    }

}