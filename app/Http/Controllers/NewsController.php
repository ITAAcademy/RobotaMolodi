<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Models\News;

class NewsController extends Controller
{
    protected $patch = 'image/uploads/news/';

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $news = News::all();
        return view('newDesign.news.index', ['news' => $news, 'patch' => $this->patch]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('newDesign.news.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validateNews($request);
        $news = new News;
        $news->name = $request->input('name');
        $news->description = $request->input('description');
        $news->img = $news->savePicture($request);
        $news->save();
        Session::flash('flash_message', 'news successfully created!');
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $newsOne = News::find($id);

        return view('newDesign.news.one', ['newsOne' => $newsOne, 'patch' => $this->patch]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $newsOne = News::find($id);
        return view('newDesign.news.edit', ['newsOne' => $newsOne]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $newsOne = News::find($id);
        $this->validateNews($request);
        $news = new News;
        $news->deleteOldPicture($id);
        $newsOne->img = $news->savePicture($request);
        $input = $request->all();
        $newsOne->fill($input)->save();
        Session::flash('flash_message', 'news successfully added!');
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $deleteImage = new News;
        $deleteImage->checkNameImage($news->img);
        $news->delete();
        Session::flash('flash_message', 'news successfully deleted!');
        return redirect()->route('news.index');
    }
    public function validateNews(Request $request){
        $this->validate($request, [
            'name' => 'required|max:150',
            'description' => 'required',
            'image' => 'sometimes|image|required|max:10240',
        ]);
    }


}
