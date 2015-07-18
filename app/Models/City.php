<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model {

    protected $table = 'cities';

    protected $fillable = ['name'];

    public function getCities()
    {
        $cities = $this->latest('id')->get();

        return $cities;
    }

}
