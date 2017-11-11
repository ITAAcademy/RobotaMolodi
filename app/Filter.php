<?php

namespace App;

use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

class Filter
{
    public static function vacancies(Request $request)
    {
        $vacancies = Vacancy::byIndustries($request->get('industries',[]))
            ->bySpecialisations($request->get('specialisations',[]))
            ->byRegions($request->get('regions',[]))
            ->byStartDate($request->get('startDate',[]))
            ->byEndDate($request->get('endDate',[]))
            ->byRating($request->get('sortRatings'))
            ->bySort($request->get('sortDate'));

        return $vacancies;
    }
}
 ?>
