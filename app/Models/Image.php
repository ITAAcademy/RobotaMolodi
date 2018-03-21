<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    public function aboutUs(){
        return $this->belongsTo('App\Models\AboutUs');
    }
}
