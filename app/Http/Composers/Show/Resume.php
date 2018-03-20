<?php

namespace App\Http\Composers\Show;

use App\Http\Composers\Show\SeoInfo\CreatorContract;
use Illuminate\Contracts\View\View;

class Resume
{
    private $creator;

    public function __construct(CreatorContract $creator)
    {
        $this->creator = $creator;
    }

    public function compose(View $view){
        if($view->offsetExists('resume')){
            $resume = $view->offsetGet('resume');
        }

        $data = $this->creator->createSeoInfo($resume);

        $view->with('seo_meta_source' , $data);
    }
}