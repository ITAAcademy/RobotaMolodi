<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 21.05.2019
 * Time: 15:30
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;


class CityCheck extends Model
{
    protected $table = 'city_check';

    protected $fillable = ['id', 'name', 'city_id'];

    public function getCities()
    {
        $cities = $this->orderBy('id')->get();

        return $cities;
    }

}