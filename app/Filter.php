<?php

namespace App;

use App\Models\Vacancy;
use App\Models\Company;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class Filter
{
    public static function vacancies(Request $request)
    {
        $vacancies = Vacancy::AllVacancies()
            ->byIndustries($request->get('industries',[]))
            ->bySpecialisations($request->get('specialisations',[]))
            ->byRegions($request->get('regions',[]))
            ->byStartDate($request->get('startDate',[]))
            ->byEndDate($request->get('endDate',[]))
            ->byRating($request->get('sortRatings'))
            ->bySort($request->get('sortDate'));

        return $vacancies;
    }
    public static function resumes(Request $request)
    {
        $resumes = Resume::byIndustries($request->get('industries',[]))
            ->bySpecialisations($request->get('specialisations',[]))
            ->byRegions($request->get('regions',[]))
            ->byStartDate($request->get('startDate',[]))
            ->byEndDate($request->get('endDate',[]))
            ->byRating($request->get('sortRatings'))
            ->bySort($request->get('sortDate'))
            ->isActive();
        return $resumes;
    }
    public static function companies(Request $request)
    {
        $companies = Company::byIndustries($request->get('industries', []))
            ->bySpecialisations($request->get('specialisations', []))
            ->byRegions($request->get('regions', []))
            ->byStartDate($request->get('startDate',[]))
            ->byEndDate($request->get('endDate',[]))
            ->byRating($request->get('sortRatings'))
            ->bySort($request->get('sortDate'));

        return $companies;
    }
    public static function routeFilterPaginator(Request $request, LengthAwarePaginator $collection)
    {
        $indastry = $request->get('industries',[]);
        $indastry ? $indastry:'';

        $regions = $request->get('regions',[]);
        $regions ? $regions:'';

        $specialisations = $request->get('specialisations',[]);
        $specialisations ? $specialisations:'';

        $collection->appends([
            'industries' => $indastry,
            'regions' => $regions,
            'specialisations' => $specialisations,
        ]);
    }
}
 ?>
