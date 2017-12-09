<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class ProjectMember extends Model
{
    protected $table = 'projects_members';
    protected $fillable = [
        'name',
        'position'
    ];
    private $rules = [
        'name' => 'required|min:3|max:32',
        'position' => 'required|min:3|max:32'
    ];
    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }

    public function isValid()
    {
        $validator = Validator::make($this->toArray(), $this->rules);
        return !$validator->fails();
    }

}
