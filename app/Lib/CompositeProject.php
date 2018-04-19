<?php

namespace App\Lib;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\UploadFile;

class CompositeProject implements IComposite
{
    private $el = null;
    private $subList = null;
    private $querySavingPhoto = null;
    private $queryDelete = null;

    public function __construct($el)
    {
        $this->el = $el;
        $this->subList = collect();
        $this->querySavingPhoto = collect();
        $this->queryDelete = collect();
    }
    public function addQueryDelete($m)
    {
        $this->queryDelete->push($m);
    }
    public function addQuerySavingPhoto($m)
    {
        $this->querySavingPhoto->push($m);
    }
    public function getRoot()
    {
        return $this->el;
    }

    public function add($key, $el)
    {
        $this->subList[$key] = $el;
    }
    public function save($rootId = null)
    {
        $this->el->setCompositeKey($rootId);
        $this->el->save();

        foreach($this->subList as $key => $values){
            foreach($values as $k=>$v)
            {
                if(isset($this->el->id))
                    $v->save($this->el->id);
                else
                    $v->save($rootId);
            }
        }
        $this->queryDelete->each(function($item, $key){
            $item->delete();
        });
        $this->querySavingPhoto->each(function($item, $key){
            $model   = $item['model'];
            $photo   = $item['photo'];
            $field   = $item['field'];
            $subPath = $item['subPath'];
            $validator = Validator::make($item, [
                'photo' => 'required|image',
            ]);
            if(!$validator->fails()){
                $path = "/uploads/projects/";
                if($subPath != '')
                    $path = $path.$subPath."/";

                UploadFile::deleteImage($model[$field]);
                $model[$field] = UploadFile::saveImage($photo, $path);
                $model->save();
            }
        });
    }

    public function isValid()
    {
        $isValid = true;
        $isValid = $this->el->validate() && $isValid;
        foreach($this->subList as $key => $values){
            foreach($values as $k=>$v)
            {
                $isValid = $v->isValid() && $isValid;
            }
        }
//        dd($isValid);
        return $isValid;
    }

    public function toArray()
    {
        $a = null;
        if(is_array($this->el))
        {
             $a = $this->el;
        }
        else {
            $a = $this->el->toArray();
        }

        $a['subList'] = [];

        foreach($this->subList as $key => $values){
            $t = [];
            foreach($values as $k=>$v)
            {
                $t[$k] = $v->toArray();
            }
            $a['subList'][$key] = $t;
        }
        return $a;
    }
}
