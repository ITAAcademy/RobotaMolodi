<?php

namespace App\Http\Controllers;

use Request;
//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Consult;
use App\Models\TimeConsultation;


class ConsultEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $consultant = Consult:: with(['timeConsult'])->get();
//        $timeConsult= TimeConsultation::all();
//        dd($consultant);
        if (Request::ajax()) {
            return view('event.index')->with('consultant', $consultant);
//            , 'timeConsult', $timeConsult
        } else {
            return view('event._index')->with('consultant', $consultant);
        }
    }


    public function show($id)
    {
        $consultant = Consult::all();
        //if($request->isAjax()){
            return json_encode($consultant);
       //}
    }

}
