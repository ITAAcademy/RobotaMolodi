<?php

namespace App\Http\Controllers;

use Request;
//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Consult;
use App\Models\TimeConsultation;
use Illuminate\Support\Facades\Auth;


class ConsultEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    const PER_PAGE = 15;
    public function index()
    {
        $consultant = Consult:: where('consult_id', '=', Auth::User()->id)
            ->with('timeConsult')
            ->paginate(self::PER_PAGE);
//        $timeConsult= TimeConsultation::all();
 //      dd($consultant);
        if (Request::ajax()) {
            return view('event.index')->with('consultant', $consultant);
//            , 'timeConsult', $timeConsult
        } else {
            return view('event._index')->with('consultant', $consultant);
        }
    }


    public function show($id)
    {
        $timeConsultations = TimeConsultation::where('consults_id', $id)
            ->get();
        //if($request->isAjax()){
            return json_encode($timeConsultations);
       //}
    }

    public function store(Request $request)
    {
        //dd($request->all());

        //return "Success!";
    }

}
