<?php

namespace App\Lib;

interface IComposite
{
    public function add($key, $el);
    public function save();
    public function isValid();

}
