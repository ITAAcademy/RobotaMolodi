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

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }

}
