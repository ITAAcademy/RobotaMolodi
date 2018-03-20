<?php

namespace App\Http\Composers\Show;

use App\Http\Composers\Show\SeoInfo\CreatorContract;
use Illuminate\Contracts\View\View;

class Company
{
    private $creator;

    public function __construct(CreatorContract $creator)
    {
        $this->creator = $creator;
    }

    public function compose(View $view){
        if($view->offsetExists('company')){
            $company = $view->offsetGet('company');
        }

        $data = $this->creator->createSeoInfo($company);

        $view->with('seo_meta_source' , $data);
    }
}