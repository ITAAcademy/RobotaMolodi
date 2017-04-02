<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\News;

class NewsController extends Controller
{
//    const DELETE='delete object';

    public function index()
    {
        $news = News::all();
        return view('newDesign.news.index', ['news' => $news]);
    }

    public function create()
    {
        return view('newDesign.news.form');
    }

    public function store(Request $request)
    {
        $news = new News;
        if ($news->validateForm($request->all())) {
            $this->helperSave($news,$request);
            Session::flash('flash_message', 'news successfully created!');
            return redirect()->route('news.index');
        } else {
            return redirect()->route('news.create')->withInput()->withErrors($news->getErrorsMessages());
        }
    }

    public function show($id)
    {
        $newsOne = News::find($id);
        return view('newDesign.news.one', ['newsOne' => $newsOne]);
    }

    public function edit($id)
    {
        $newsOne = News::find($id);
        return view('newDesign.news.edit', ['newsOne' => $newsOne]);
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
            return redirect()->route('news.index');
        } else {
            return redirect()->route('news.edit', ['newsOne' => $newsOne])->withInput()->withErrors($newsOne->getErrorsMessages());

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
        return redirect()->route('news.index');
    }
    private function helperSave($news,$request){
        $news->saveImage($request);
        $input = $request->all();
        $news->fill($input)->save();
    }


}
