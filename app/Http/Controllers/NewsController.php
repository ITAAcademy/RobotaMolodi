<?php

namespace App\Http\Controllers;

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
        return view('newDesign.News.newsIndex', ['news' => $news, 'patch' => $this->patch]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('newDesign.News.newsForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $news = new News();
            $this->validate($request, [
                'title' => 'required|max:150',
                'description' => 'required',
                'image' => 'sometimes|image|required|max:10240',
            ]);
            $fileName = $news->savePicture($request);
            $news->createModel($request, $fileName);

        }
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
        $newsOne = News::findOrFail($id);
        return view('newDesign.News.newsOne', ['newsOne' => $newsOne, 'patch' => $this->patch]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $newsOne = News::findOrFail($id);
        return view('newDesign.News.newsEdit', ['newsOne' => $newsOne]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $newsOne = News::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|max:150',
            'description' => 'required',
            'image' => 'sometimes|image|required|max:10240',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $pictureName = $file->getClientOriginalName();
            $destinationPath = 'image/uploads/news';
            $file->move($destinationPath, $file->getClientOriginalName());
            $newsOne->img = $pictureName;
        } else {
            $newsOne->img = "Not picture";
        }
        $input = $request->all();
        $newsOne->fill($input)->save();
        Session::flash('flash_message', 'Task successfully added!');
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
        $news = News::findOrFail($id);

        $news->delete();

        Session::flash('flash_message', 'Task successfully deleted!');

        return redirect()->route('news.index');
    }


}
