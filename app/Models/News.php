<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation;
use Illuminate\Http\Request;

//use Validator;
class News extends Model
{
    public $patch = 'image/uploads/news/';
    private $rules = array(
        'title' => 'required|max:1',
        'description' => 'required',
        'image' => 'required',

    );
    protected $fillable = [
        'id',
        'name',
        'description',
        'img',
    ];

    public function savePicture(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $pictureName = $file->getClientOriginalName();
            $timestamp = time();
            $pictureName = $timestamp . "_" . $pictureName;
            $file->move($this->patch, $pictureName);
        } else {
            $pictureName = "Not picture";
        }
        return $pictureName;
    }

    public function deleteOldPicture($id)
    {
        $images = News::find($id);
        $this->checkNameImage($images->img);
    }

    public function checkNameImage($name)
    {
        if ($name != 'Not picture') {
            $this->deleteImage($name);
        }
    }

    private function deleteImage($name)
    {
        $exists = Storage::disk('local')->has($this->patch.$name);
        if($exists)
        Storage::delete($this->patch . $name);
    }

}
