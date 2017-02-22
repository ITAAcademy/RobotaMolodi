<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FilterController extends Controller
{
    public function vacancies(Request $request)
    {
//        dd($request->all());
        $vacancies = Vacancy::all();
        $vacancies = $vacancies->byIndustries([2]);
        dd($vacancies);


    }


}
