<?php

namespace App\Models;

use Illuminate\Support\Facades\Validator;

trait ModelValidator{

    /**
    * The value is containes validation's errors.
    *
    * @var array
    */
    private $errors = null;

    public function validate()
    {
        $v = Validator::make($this->toArray(), $this->rules);
        if ($v->fails())
        {
            $this->errors = $v->errors();
            return false;
        }
        return true;
    }

    public function errors()
    {
        return $this->errors;
    }

}
