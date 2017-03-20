<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class News extends Model
{
    const DELETE = 'delete image';
    const NOT_PICTURE = 'Not picture';
    private $patch = 'image/uploads/news/';
    public $errorsMessages;

    private $rules = array(
        'name' => 'required|max:150',
        'description' => 'required',
        'image' => 'sometimes|image|max:10240',
    );
    protected $fillable = [
        'id',
        'name',
        'description',
        'img',
    ];

    public function savePicture(Request $request)
    {
        if (!$this->img && $request->hasFile('image')) {
            $pictureName = $this->fileSave($request);
        }
        else if ($this->img && $request->hasFile('image')) {
            $pictureName = $this->fileSave($request);
            $this->deleteObj(self::DELETE);
        }
        else if ($this->img && !$request->hasFile('image')) {
            $pictureName = self::NOT_PICTURE;
            $this->deleteObj(self::DELETE);
        }
        else{
            $pictureName = self::NOT_PICTURE;
        }
        $this->img = $pictureName;
    }

    public function deleteObj($string)
    {
        if ($string != self::DELETE) {
            $this->delete();
        }
        $exists = Storage::disk('local')->has($this->patch . $this->img);
        if ($exists)
            Storage::delete($this->patch . $this->img);
    }

    private function fileSave($request)
    {
        $file = $request->file('image');
        $pictureName = $file->getClientOriginalName();
        $timestamp = time();
        $pictureName = $timestamp . "_" . $pictureName;
        $file->move($this->patch, $pictureName);
        return $pictureName;
    }

    public function validateForm($news)
    {
        $validatorCity = Validator::make($news, $this->rules);
        if ($validatorCity->fails()) {
            $this->errorsMessages = $validatorCity->getMessageBag()->all();
            return false;
        }
        return true;
    }

    public function getPatch()
    {
        return $this->patch;
    }

}