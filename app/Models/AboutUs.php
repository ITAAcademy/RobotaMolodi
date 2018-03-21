<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $fillable = [
        'id',
        'title',
        'short_description',
        'description',
        'year',
        'published'
    ];


    public function image(){
        return $this->hasMany('App\Models\Image');
    }
}
