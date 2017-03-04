<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Resume;
use Illuminate\Http\Request;
use App\Models\Vacancy;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

class FilterController extends Controller
{
    public function vacancies(Request $request)
    {
        $vacancies = Vacancy::byIndustries($request->get('industries',[]))
            ->bySpecialisations($request->get('specialisations',[]))
            ->byRegions($request->get('regions',[]))
            ->paginate();

        return view('newDesign.vacancies.vacanciesList', ['vacancies' => $vacancies]);
    }

    public function resumes(Request $request)
    {
        $resumes = Resume::byIndustries($request->get('industries',[]))
            ->bySpecialisations($request->get('specialisations',[]))
            ->byRegions($request->get('regions',[]))
            ->paginate();

        return view('newDesign.resume.resumesList', ['resumes' => $resumes]);
    }

//    public function companies(Request $request)
//    {
//        $companies = Vacancy::byIndustries($request->get('industries',[]))
//            ->bySpecialisations($request->get('specialisations',[]))
//            ->byRegions($request->get('regions',[]))
//            ->where('')
//            ->paginate();
//
//        return view('newDesign.company.companiesList', ['companies' => $companies]);
//    }

}
