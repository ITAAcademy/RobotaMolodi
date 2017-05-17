<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    protected $fillable = ['image', 'url', 'category_id'];

    public $timestamps = false;

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
