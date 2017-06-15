<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Rating extends Model
{
    protected $table = 'ratings';
    protected $fillable = ['id', 'user_id', 'object_id', 'object_type', 'value', 'created_at', 'updated_at'];
    private static $errorsMessages;

    public static function getErrorsMessages()
    {
        return Rating::$errorsMessages;
    }

    public static function isValid($data){
        $valid= Validator::make($data, ['mark' => 'required|in:-1,1']);
        if ($valid->fails()) {
            Rating::$errorsMessages = $valid->getMessageBag()->setFormat('Ratings error');
            return false;
        }
        return true;
    }

    /*получить первых 3 символа из имени таблицы:
    substr(strtolower(class_basename($object)),0,3)*/

    public static function addRate($mark, $object){
        Rating::updateOrCreate(['user_id' => Auth::id(), 'object_type' => substr(strtolower(class_basename($object)),0,3), 'object_id' => $object->id],
            ['value' => $mark, 'user_id' => Auth::id(), 'object_id' => $object->id, 'object_type' => substr(strtolower(class_basename($object)),0,3)]);
    }

    public static function getLikes($object){
        return $object->rates()->where('value', 1)->count();
    }

    public static function getDisLikes($object){
        return $object->rates()->where('value', -1)->count();
    }
}
