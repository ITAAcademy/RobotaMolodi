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
        $news = News::latest('updated_at')->getPublished();

        if(Request::ajax()){
            return view('newDesign.news.includeNews.newsListContent', array(
                'newsPagin' => $news->paginate(5)
            ));
        }
        $topVacancy = Vacancy::bySort('desc')->take(5)->get();
        return view('newDesign.news.includeNews.newsList', [
            'news'=> $news->get(),
            'newsPagin' => $news->paginate(5),
            'cities' => City::all(),
            'industries' => Industry::all(),
            'topVacancy' => $topVacancy,
        ]);
    }

    public function show($id)
    {
        if (!is_numeric($id))
        {
            abort(404);
        }

        $newsOne = News::find($id);
        if(!isset($newsOne))
        {
            abort(404);
        }

        $topVacancy = Vacancy::bySort('desc')->take(5)->get();

        return view('newDesign.news.includeNews.newsPage', [
            'news'=> News::latest('updated_at')->get(),
            'newsOne' => $newsOne,
            'cities' => City::all(),
            'industries' => Industry::all(),
            'topVacancy' => $topVacancy,
        ]);
    }

}
