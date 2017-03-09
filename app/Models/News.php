<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation;

//use Validator;
class News extends Model
{
    private $rules = array(
        'title' => 'required|max:1',
        'description' => 'required',
        'image' => 'required',

    );

    public function createModel($request, $pictureName)
    {
        $patch = 'image/uploads/news/';
        $news = new News;
        $news->name = $request->input('title');
        $news->description = $request->input('description');
        $news->img = $patch . $pictureName;
        $news->published = '1';
        $news->save();

    }

    public function validation($request)
    {
//        $this->validate($request, [
//            'title' => 'required|unique:news,id',
//            'description' => 'required',
//            'image' => 'image|required|size:10240',
//
//        ]);

//        $validator = Validator::make($request->all(), [
//            'title' => 'required|unique:news,id',
//            'description' => 'required',
//            'image' => 'image|required|max:10240',
//        ]);
//
//        if ($validator->fails()) {
//            return redirect()->back()->withErrors($$validator->errors());
//            return view('newDesign.News.newsForm')->withErrors($validator);
//            return redirect()->route(['names' => ['create' => 'news.create']])->withErrors($validator)->withInput();
//        }

    }

    public function errors()
    {
//        return $this->errors;
    }
}
