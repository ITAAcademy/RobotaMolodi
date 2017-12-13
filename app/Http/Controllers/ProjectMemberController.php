<?php

namespace App\Http\Controllers;

use App\Models\ProjectMember;

class ProjectMemberController
{
    private $valid = false;

    public function makeMembers($membersHash)
    {
        $isValid = true;
        $members = collect();
        foreach($membersHash as $dataMember)
        {
            $m = new ProjectMember($dataMember);
            $isValid = $isValid && $m->validate();
            $members->push($m);
        }
        $this->valid = $isValid;
        return $members;
    }

    public function fillMembers($dataMembers, $projectId)
    {
        $isValid = true;
        $members = collect();
        foreach($dataMembers as $memeberHash)
        {
            if(!$memeberHash['id'])
            {
                $m = new ProjectMember($memeberHash);
                $m->project_id = $projectId;
            } else {
                $m = ProjectMember::find($memeberHash['id']);
                if($m->project_id === $projectId){
                    $m->fill($memeberHash);
                }
            }
            $isValid = $isValid && $m->validate();
            $members->push($m);
        }
        $this->valid = $isValid;
        return $members;
    }

    public function isValid()
    {
        return $this->valid;
    }
}
