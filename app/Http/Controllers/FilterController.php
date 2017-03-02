<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Vacancy;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

class FilterController extends Controller
{
    public function vacancies(Request $request)
    {
        $dp1 = $request->get('industries',[]);
        $dp2 = $request->get('regions',[]);
        $dp3 = $request->get('specialisations',[]);
        $vacancies = Vacancy::byIndustries($dp1)
            ->bySpecialisations($dp3)
            ->byRegions($dp2)
            ->paginate();

        return view('newDesign.vacancies.vacanciesList', ['vacancies' => $vacancies]);
    }
}
