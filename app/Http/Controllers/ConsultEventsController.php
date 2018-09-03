<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        //
        //$consultant = Consult::all();
        //if($request->isAjax()){
        //return json_encode($consultant);
        //}
    }


    public function show($id)
    {
        $consultant = TimeConsultation::where('consults_id', $id)
                       ->get();

        //if($request->isAjax()){
            return json_encode($consultant);
       //}
    }

}
