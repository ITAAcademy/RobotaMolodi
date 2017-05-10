<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    protected $fillable = ['image', 'url', 'category'];

    public $timestamps = false;
    
    private $rules = array(
        'category' => 'required|max:150',
        'url' => 'required',
        'image' => 'sometimes|image|max:2048',
    );
}
