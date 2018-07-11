<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    //
        return redirect('newDesign.consults.index');
    }

}