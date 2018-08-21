<?php

namespace App\Http\Controllers;

use Auth;
use App\Consult;
use App\Models\City;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use App\Models\TimeConsultation;

class ConsultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('newDesign.consults.index');
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


    public function create()
    {
        $cities = City::all();
        $industries = Industry::all();
        return view('consult.create', ['cities' => $cities, 'industries' => $industries]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $consult = new Consult($request->except(["time_start", "time_end"]));

//        transaction()

        foreach ($request->consultation_times as $key => $value) {

            $timeConsultation = new TimeConsultation(['time_start'=> json_decode($value)->time_start, 'time_end' => json_decode($value)->time_end, "consults_id" => $consult->consult_id]);

            $timeConsultation->save();
        }

        $consult->save();

        return redirect('sconsult');
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