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
        $news = News::getPublished()->latest('created_at')->paginate(5);

        if(Request::ajax()){
            return view('newDesign.news.includeNews.newsListContent', ['newsPagin' => $news]);
        }

        $topVacancy = Vacancy::bySort('desc')->take(5)->get();
        return view('newDesign.news.includeNews.newsList', [
            'news'=> News::getNews(),
            'newsPagin' => $news,
            'cities' => City::all(),
            'industries' => Industry::all(),
            'topVacancy' => $topVacancy,
        ]);
    }
    
    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $newsOne = News::find($id);
        if(!isset($newsOne)) {
            abort(404);
        }
        $topVacancy = Vacancy::bySort('desc')->take(5)->get();

        return view('newDesign.news.includeNews.newsPage', [
            'news'=> News::getNews(),
            'newsOne' => $newsOne,
            'cities' => City::all(),
            'industries' => Industry::all(),
            'topVacancy' => $topVacancy,
            'previous' => $newsOne->previous(),
            'next' => $newsOne->next(),
        ]);
    }

}
