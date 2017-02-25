<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

class FilterController extends Controller
{
    public function vacancies(Request $request)
    {
     // dd($request->all());
        $vacancies = $request->all();
        $vacancies = Vacancy::ByIndustries($vacancies["industries"])->get();
        dd($vacancies);


    }


}
