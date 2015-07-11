<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model {

    protected $table = 'industries';

    public $timestamps = false;

    public function getIndustries()
    {
        $industries = $this->latest('id')->get();

        return $industries;
    }
}
