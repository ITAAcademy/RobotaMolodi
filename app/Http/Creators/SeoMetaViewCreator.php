<?php

namespace App\Http\Creators;

use App\Models\SeoInfo;
use Illuminate\Support\Facades\URL;
use Illuminate\Contracts\View\View;

class SeoMetaViewCreator
{
    public function create(View $view){
        $url = URL::getRequest()->path();
        $data = SeoInfo::where('url', $url)->first();

        if($data == null){
            $default = [
                'title' => 'Robota molodi',
                'description' => 'Robota molodi is a project created to make communication between employers and young specialists'
            ];
            $data = new SeoInfo($default);
        }

        $view->with('data' , $data);
    }
}