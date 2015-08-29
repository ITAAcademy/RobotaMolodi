<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model {

    protected $table = 'industries';
// Get all industries order by name
    public function getIndustries()
    {
        $industries = $this->orderBy('name')->get();

        return $industries;
    }
}
