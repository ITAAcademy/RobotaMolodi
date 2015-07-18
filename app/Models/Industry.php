<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model {

    protected $table = 'industries';

    public function getIndustries()
    {
        $industries = $this->latest()->get();

        return $industries;
    }
}
