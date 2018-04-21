<?php

namespace App\Http\Controllers\Vacancy;

use App\Models\Vacancy;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function byIndustries(Request $request) {
        $vacancies = Vacancy::where('branch', $request->get('industries',[]));
//        dd($vacancies->get());
        return response()->json($vacancies->get()->unique('position'));
    }
}
