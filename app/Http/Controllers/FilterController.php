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
//      dd($request->all());
        $dp1 = $request->get('industries',[]);
        $dp2 = $request->get('regions',[]);
        $dp3 = $request->get('specialisations',[]);
        $filter = $request->all();
        $vacancies =
//        dd($vacancies);
//            if(isset($filter["industries"])){
//                $vacancies = $vacancies->byIndustries($filter["industries"]);
//            }
//            if(isset($filter["regions"])){
//                $vacancies = $vacancies->byRegions($filter["regions"]);
//            }
//            if(isset($filter["specialisations"])){
//                $vacancies = $vacancies->bySpecialisations($filter["specialisations"]);
//            }
//            $vacancies = $vacancies->get();
            Vacancy::byIndustries($dp1)
                ->bySpecialisations($dp3)
//            ->byRegions($dp2)

            ->get();
        dd($vacancies);


    }


}
