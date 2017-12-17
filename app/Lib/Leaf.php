<?php

namespace App\Lib;

class Leaf implements IComposite
{
    private $el = null;

    public function __construct($el)
    {
        $this->el = $el;
    }
    public function add($key, $el)
    {
        return null;
    }
    public function save()
    {

    }
    public function isValid()
    {

    }
    public function getJson()
    {

    }
    public function toArray()
    {
        $a = null;
        if(is_array($this->el))
            $a = $this->el;
        else
            $a = $this->el->toArray();

        return $a;
    }
}
