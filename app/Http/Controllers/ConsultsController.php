<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Auth;
use App\Models\Consult;
use App\Models\City;
use App\Models\Industry;
use Illuminate\Http\Request;
use App\Models\TimeConsultation;
use App\Models\Resume;
use App\Models\Vacancy;
use App\Models\News;
use App\Models\Rating;

class ConsultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $consultants= Consult::with('user')->paginate(5);
        //dd($consultants);
        $specialisations = Resume::groupBy('position')->lists('position');
        if ($request->ajax()) {
           return view('newDesign.consults.index', ['consultants' => $consultants]);
            // return view('newDesign.consults.index');

        }

        $topVacancy = Vacancy::getTopVacancies();

        return view('main.filter.filterConsultants', array(
            'consultants' => $consultants,
            'cities' => City::all(),
            'industries' => Industry::all(),
            'specialisations' => $specialisations,
            'news' => News::getNews(),
            'topVacancy' => $topVacancy,
        ));


    }


    public function showConsult(Request $request)
    {
        // return view('consult.show');
    }

    public function show($id)
    {
        $consultant = Consult::find($id);


        return view('consult.show', compact('consultant', $consultant));
        //->with('consultant',$consultant);

    }




        public function rateConsult($id, Request $request)
    {
        $consultant  = Consult::find($id);
        if(Rating::isValid($request->all())){
            $mark = $request->mark;
            Rating::addRate($mark, $consultant);
            $countLike = Rating::getLikes($consultant);
            $countDisLike = Rating::getDislikes($consultant);
            return ['countLike' => $countLike, 'countDisLike' => $countDisLike];
        } else {
            return ['error' => Rating::getErrorsMessages()->first('mark')];
        }
    }




}
//
//public function index($id){
//    $events = Consult::find($id)->events();
//    if($request->isAjax()){
//        return response()->json($events);
//    }
//
//}