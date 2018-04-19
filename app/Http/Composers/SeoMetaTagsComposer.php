<?php

namespace App\Http\Composers;

use App\Models\SeoInfo;
use Illuminate\Support\Facades\URL;
use Illuminate\Contracts\View\View;

class SeoMetaTagsComposer {

    public function compose(View $view){

        if($view->offsetExists('seo_meta_source')){
            $data = $view->offsetGet('seo_meta_source');
        } else {
            $url = URL::getRequest()->path();
            $data = SeoInfo::where('url', $url)->first();

            if($data == null){
                $default = [
                    'title' => 'Robota molodi',
                    'description' => 'Robota molodi is a project created to make communication between employers and young specialists'
                ];
                $data = new SeoInfo($default);
            }
        }

        $view->with('data' , $data);
    }
}