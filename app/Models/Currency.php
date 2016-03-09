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
}