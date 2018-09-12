<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Currency extends Model
{
    protected $table = 'currencies';
    protected $fillable = ['currency'];

    //Get all currencies order by id
    public function getCurrencies()
    {
        $currencies = $this->orderBy('id')->get();

        return $currencies;
    }

    public function resumes()
    {
        return $this->hasMany('App\Models\Resume', 'currency_id');
    }

    public function consults()
    {
        return $this->hasMany('App\Models\Consult', 'currency_id');
    }

}
