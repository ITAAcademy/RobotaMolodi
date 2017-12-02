<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
    protected $table = 'projects_members';
    protected $fillable = [
        'name',
        'position'
    ];
    static public function validationRules()
    {
        return [
            'members' => 'required|array|member',
        ];
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }

}
