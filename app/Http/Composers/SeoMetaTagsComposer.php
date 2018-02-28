<?php

namespace App\Http\Composers;

use App\Models\SeoInfo;
use Illuminate\Support\Facades\URL;
use Illuminate\Contracts\View\View;

class SeoMetaTagsComposer {

    public function compose(View $view){
        $url = URL::current();
        $data = SeoInfo::where('url', $url)->first();

        if($data == null){
            $default = [
                'title' => 'Robota molodi / Meta title',
                'description' => 'Robota molodi is a project created to make communication between employers and young specialists'
            ];
            $data = new SeoInfo($default);
        }
        $view->with('data' , $data);
    }
}