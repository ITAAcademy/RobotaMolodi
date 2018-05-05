<?php

namespace App\Http\Controllers\Vacancy;

use App\Models\Vacancy;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function byIndustries(Request $request)
    {
        $specialisations = Vacancy::byIndustries($request->get('industries',[]))->get()->unique('position');
        return response()->json($specialisations);
    }
}
