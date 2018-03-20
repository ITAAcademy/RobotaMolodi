<?php

namespace App\Http\Composers\Show;

use App\Http\Composers\Show\SeoInfo\CreatorContract;
use Illuminate\Contracts\View\View;

class Vacancy
{
    private $creator;

    public function __construct(CreatorContract $creator)
    {
        $this->creator = $creator;
    }

    public function compose(View $view){
        if($view->offsetExists('vacancy')){
            $vacancy = $view->offsetGet('vacancy');
        }

        $data = $this->creator->createSeoInfo($vacancy);

        $view->with('seo_meta_source' , $data);
    }
}