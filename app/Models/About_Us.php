<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
class About_Us extends Model
{
    protected $fillable = [
        'title',
        'short_description',
        'description',
        'published',
        'year'
    ];

    public function photos(){
        return $this->hasMany('App\Models\Photo');
    }

    public function  attachImages($images){
       return About_Us::photos()->attach($images);
    }
}
