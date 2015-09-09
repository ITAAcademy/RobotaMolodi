<?php
/**
 * Created by PhpStorm.
 * User: Quicks
 * Date: 07.09.2015
 * Time: 20:16
 */

namespace App\Models\profOrientation;


use Illuminate\Database\Eloquent\Model;

class UserSession extends Model {

    protected $table = "po_user_session";

    public $timestamps = false;

    protected $filiable = ['id','username','rm_id','sex','password','token'];



    public function __construct($name,$sex)
    {
        $this->username = $name;
        $this->sex = $sex;
        $this->save();

    }
    public function GetInstance($name,$sex)
    {
        $this->app->singleton('UserSession',function($name,$sex)
        {
            return new UserSession($name,$sex);
        });
    }
}