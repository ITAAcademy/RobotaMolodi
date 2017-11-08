<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Resume;
use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use App\Models\City;
use App\Models\Industry;
use App\Models\News;
use View;

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

        if($request->ajax()){
            return view('newDesign.vacancies.vacanciesList', ['vacancies' => $vacancies]);
        } else {
            $topVacancy = Vacancy::bySort('desc')->take(5)->get();
            $specialisations = Vacancy::groupBy('position')->lists('position');

            return View::make('main.filter.filterVacancies', array(
                'vacancies' => $vacancies,
                'cities' => City::all(),
                'industries' => Industry::all(),
                'specialisations' => $specialisations,
                'news'=>News::getNews(),
                'topVacancy' => $topVacancy,
            ));
        }
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

        return view('newDesign.company.companiesList', ['companies' => $companies]);
    }
}
