<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Slider;

class SliderController extends Controller
{
    public function byCategory(Request $request){
        $sliders = Slider::isRelevant($request->category)->orderBy('position')->get();
        return view('newDesign.sliders.'.$request->slider, [ 'sliders' => $sliders ]);
    }
}
