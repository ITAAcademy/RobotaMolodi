<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation;
use Illuminate\Http\Request;

//use Validator;
class News extends Model
{
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

    public function createModel(Request $request, $pictureName)
    {
        $news = new News;
        $news->name = $request->input('name');
        $news->description = $request->input('description');
        $news->img = $pictureName;
        $news->save();
    }

    public function savePicture(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $pictureName = $file->getClientOriginalName();
            $destinationPath = 'image/uploads/news';
            $file->move($destinationPath, $file->getClientOriginalName());
        } else {
            $pictureName = "Not picture";
        }
        return $pictureName;
    }

}
