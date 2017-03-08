<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function createModel($request,$pictureName)
    {
        $patch='image/uploads/news/';
        $news=new News;
        $news->name=$request->input('title');
        $news->description=$request->input('description');
        $news->img=$patch.$pictureName;
        $news->published='1';
        $news->save();

    }
}
