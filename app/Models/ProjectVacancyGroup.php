<?php

namespace App\Models;

class ProjectVacancyGroup
{
    private $data = null;

    public function __construct($data)
    {
        $this->data = $data;
    }
    public function validate()
    {
        return true;
    }
    public function toArray()
    {
        return $this->data;
    }
}
