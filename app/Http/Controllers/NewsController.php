<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Industry;
use App\Models\Vacancy;

use App\Models\News;

use Request;


class NewsController extends Controller
{

    public function index()
    {
        $news = News::latest('updated_at');

        if(Request::ajax()){
            return view('newDesign.news.includeNews.newsListContent', array(
                'newsPagin' => $news->paginate(4)
            ));
        }
        $topVacancy = Vacancy::bySort('desc')->take(5)->get();
        return view('newDesign.news.includeNews.newsList', [
            'news'=> $news->get(),
            'newsPagin' => $news->paginate(4),
            'cities' => City::all(),
            'industries' => Industry::all(),
            'topVacancy' => $topVacancy,
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
        $newsOne = News::find($id);
        $topVacancy = Vacancy::bySort('desc')->take(5)->get();

        return view('newDesign.news.includeNews.newsPage', [
            'news'=> News::latest('updated_at')->get(),
            'newsOne' => $newsOne,
            'cities' => City::all(),
            'industries' => Industry::all(),
            'topVacancy' => $topVacancy,
        ]);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }

}
