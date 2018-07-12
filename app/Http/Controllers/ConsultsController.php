<?php

namespace App\Http\Controllers;

use App\Consult;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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

    return view('consult.show');

}


public function create()
    {
        //
        return view('consult.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */

    public function store(Request $request)
    {
        $consult = new Consult;
  //      dd($request);
        $consult->consult_id = auth()->user()->id;

        $consult->telephone = $request->get('telephone');
        $consult->city = $request->get('city');
        $consult->area = $request->get('area');
        $consult->position = $request->get('position');
        $consult->description = $request->get('description');

        $consult->save();
        return redirect('sconsult');
    }

}
