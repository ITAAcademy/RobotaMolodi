<?php

namespace App\Http\Composers\Show;

use App\Models\SeoInfo;
use Illuminate\Contracts\View\View;

class Resume
{
    public function compose(View $view){
        if($view->offsetExists('resume')){
            $resume = $view->offsetGet('resume');
        }

        $data = new SeoInfo(['title'=> $resume->position ,'description' => $resume->description ]);

        $view->with('seo_meta_source' , $data);
    }
}