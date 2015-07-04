<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model {
    protected $table = "resumes";
    protected $fillable = ['position','telephone','email', 'name_u', 'industry', 'salary','city', 'description'];

}
