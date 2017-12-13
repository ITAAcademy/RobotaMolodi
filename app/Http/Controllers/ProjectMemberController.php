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

    public function isValid()
    {
        return $this->valid;
    }
}
