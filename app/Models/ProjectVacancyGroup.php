<?php

namespace App\Models;

class ProjectVacancyGroup
{
    private $data = null;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function save()
    {
        
    }
    public function validate()
    {
        return true;
    }
    public function toArray()
    {
        return $this->data;
    }

    public function setCompositeKey($rootId)
    {
        return true;
    }
}
