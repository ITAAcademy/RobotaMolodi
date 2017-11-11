<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Resume;
use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Response;

class FilterController extends Controller
{
    public function vacancies(Request $request)
    {
        $vacancies = Vacancy::byIndustries($request->get('industries',[]))
            ->bySpecialisations($request->get('specialisations',[]))
            ->byRegions($request->get('regions',[]))
            ->byStartDate($request->get('startDate',[]))
            ->byEndDate($request->get('endDate',[]))
            ->byRating($request->get('sortRatings'))
            ->bySort($request->get('sortDate'))
            ->paginate();
        $indastry = $request->get('industries',[]);
        $indastry ? $indastry:'';
        $vacancies->appends(['industries' => $indastry]);
        return Response::view('newDesign.vacancies.vacanciesList', ['vacancies' => $vacancies])
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }

    public function resumes(Request $request)
    {
        $resumes = Resume::byIndustries($request->get('industries',[]))
            ->bySpecialisations($request->get('specialisations',[]))
            ->byRegions($request->get('regions',[]))
            ->byStartDate($request->get('startDate',[]))
            ->byEndDate($request->get('endDate',[]))
            ->byRating($request->get('sortRatings'))
            ->bySort($request->get('sortDate'))
            ->paginate();
        $resumes->setPath(route('main.resumes'));
        return view('newDesign.resume.resumesList', ['resumes' => $resumes]);
    }

    public function companies(Request $request)
    {
        $companies = Company::byIndustries($request->get('industries', []))
            ->bySpecialisations($request->get('specialisations', []))
            ->byRegions($request->get('regions', []))
            ->byStartDate($request->get('startDate',[]))
            ->byEndDate($request->get('endDate',[]))
            ->byRating($request->get('sortRatings'))
            ->bySort($request->get('sortDate'))
            ->paginate();
        $companies->setPath(route('main.companies'));
        return view('newDesign.company.companiesList', ['companies' => $companies]);
    }
}
