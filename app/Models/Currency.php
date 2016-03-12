<?php namespace App\Models;

/**
 * Created by PhpStorm.
 * User: adm
 * Date: 07.03.2016
 * Time: 23:55
 */
use Illuminate\Database\Eloquent\Model;
class Currency extends Model
{

    protected $table = 'currencies';

    public function updateData(){
        $result = file_get_contents('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=3');
        $currencyArray = json_decode($result, true);
        foreach($currencyArray as $item)
        {
            $updateModel = $this->findByCurrency($item['ccy']);
            if ($updateModel){
            $updateModel->index = $item['buy'];
            $updateModel->save();
            }
        }
    }

    public function findByCurrency($currencyName)
    {
        return $this->where('currency', '=', $currencyName)->first();
    }

}