<?php
/**
 * Created by PhpStorm.
 * User: Quicks
 * Date: 08.09.2015
 * Time: 16:22
 */

namespace App\Models\profOrientation;


use Illuminate\Database\Eloquent\Model;

class Answer extends Model {

    protected $table = 'po_answers';

    public $timestamps = false;

    public function FillHole($testNumber,$answer,$value,$po_user_id)
    {

        $this->testNumber = $testNumber;
        $this->answer = $answer;
        $this->value = $value;
        $this->po_user_id = $po_user_id;
        $this->save();
        return $this;
    }
}