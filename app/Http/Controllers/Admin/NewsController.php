<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateNewsRequest;
use App\Services\ImageCompress;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Models\News;

class NewsController extends Controller
{
//    const DELETE='delete object';

    public function index()
    {
        $news = News::latest('created_at')->paginate(10);
        return view('newDesign.admin.news.index', ['news' => $news]);

    }

    public function create()
    {
        return view('newDesign.admin.news.create');
    }

    public function store(StoreUpdateNewsRequest $request)
    {
        $news = new News;
        $this->helperSave($news,$request);
        Session::flash('flash_message', 'news successfully created!');
        return redirect()->route('admin.news.index');
    }

    public function show($id)
    {

        $newsOne = News::find($id);
        return view('newDesign.admin.news.one', ['newsOne' => $newsOne]);
    }

    public function edit($id)
    {
        $newsOne = News::find($id);
        return view('newDesign.admin.news.edit', ['newsOne' => $newsOne]);
    }

    public function update(StoreUpdateNewsRequest $request, $id)
    {
        /**
         * @var News $newsOne
         */
        $newsOne = News::find($id);
        $this->helperSave($newsOne,$request);
        Session::flash('flash_message', 'news successfully added!');
        if($newsOne->img!='Not picture') ImageCompress::tinifyImage($newsOne->getPath() . $newsOne->img);
        return redirect()->route('admin.news.index');
    }

    public function destroy($id)
    {
        /**
         * @var News $news
         */
        $news = News::find($id);
        $news->delete();
        return redirect()->route('admin.news.index');
    }
    private function helperSave($news, $request){
        if($request->image !='Not picture') {
            $news->saveImage($request);
        }
        $input = $request->all();
        $news->fill($input)->save();
    }

    public function updatePublished($news_id){
        $chosenNews = News::find($news_id);
        $chosenNews->published = $chosenNews->published == 0 ? 1 : 0;
        $chosenNews->save();
        return $chosenNews->published;
    }

}
