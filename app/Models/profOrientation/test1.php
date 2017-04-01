<?php
/**
 * Created by PhpStorm.
 * User: Quicks
 * Date: 07.09.2015
 * Time: 11:45
 */
namespace App\Models\profOrientation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Symfony\Component\Yaml\Tests\A;

class test1 extends Model {

    protected $table = 'po_test1';

    public $timestamps = false;

    private $userSession;

    public function StartTest($name,$sex,$userSession)
    {
        $this->userSession = $userSession;
       //        $this->GetNextQuestion(1,0);


    }

    public function GetNextQuestion($id,$answer,Request $request)
    {

        if($id > count(test1::all()))
        {
            test1::ShowResults();
        }
        else
        {
            $question = test1::find($id);
            $value = $request['value'];
            test1::StoreAnswer($answer,$value);

            return $question;
        }
    }

    private function StoreAnswer($answer,$value)
    {
        $ans = new Answer();
        $testNumber = 1;


        $po_user_id = $this->userSession->id;
        $ans->FillHole($testNumber,$answer,$value,$po_user_id);


    }

    public function ShowResults()
    {
            dd("dsadsada");
    }
}