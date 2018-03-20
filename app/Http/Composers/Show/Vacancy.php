<?php

namespace App\Http\Composers\Show;

use App\Models\SeoInfo;
use Illuminate\Contracts\View\View;

class Vacancy
{
    public function compose(View $view){
        if($view->offsetExists('vacancy')){
            $vacancy = $view->offsetGet('vacancy');
        }

        $data = new SeoInfo(['title'=> $vacancy->position ,'description' => $vacancy->description ]);

        $view->with('seo_meta_source' , $data);
    }
}