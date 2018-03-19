<?php

namespace App\Http\Controllers\Admin;

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
        $news = News::latest('created_at')->get();
        return view('newDesign.admin.news.index', ['news' => $news]);
    }

    public function create()
    {
        return view('newDesign.admin.news.create');
    }

    public function store(Request $request)
    {
        $news = new News;
        if ($news->validateForm($request->all())) {
            $this->helperSave($news,$request);
            Session::flash('flash_message', 'news successfully created!');
            ImageCompress::tinifyImage($news->getPath() . $news->img);
            return redirect()->route('admin.news.index');
        } else {
            return redirect()->route('admin.news.create')->withInput()->withErrors($news->getErrorsMessages());
        }
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

    public function update(Request $request, $id)
    {
        /**
         * @var News $newsOne
         */
        $newsOne = News::find($id);
        if ($newsOne->validateForm($request->all())) {
            $this->helperSave($newsOne,$request);
            Session::flash('flash_message', 'news successfully added!');
            ImageCompress::tinifyImage($newsOne->getPath() . $newsOne->img);
            return redirect()->route('admin.news.index');
        } else {
            return redirect()->route('admin.news.edit', ['newsOne' => $newsOne])->withInput()->withErrors($newsOne->getErrorsMessages());

        }
    }

    public function destroy($id)
    {
        /**
         * @var News $news
         */
        $news = News::find($id);
        $news->deleteNews();
        Session::flash('flash_message', 'news successfully deleted!');
        return redirect()->route('admin.news.index');
    }
    private function helperSave($news, $request){
        if($request->image) {
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
