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
    public function save($rootId = null)
    {
        $this->el->setCompositeKey($rootId);
        $this->el->save();
    }
    public function isValid()
    {
        return $this->el->validate();
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
