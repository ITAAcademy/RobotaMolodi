<?php

namespace App\Http\Composers\Show;

use App\Models\SeoInfo;
use Illuminate\Contracts\View\View;

class Company
{
    public function compose(View $view){
        if($view->offsetExists('company')){
            $company = $view->offsetGet('company');
        }

        $data = new SeoInfo(['title'=> $company->name ,'description' => $company->description ]);

        $view->with('seo_meta_source' , $data);
    }
}