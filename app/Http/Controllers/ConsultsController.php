<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Consult;
use App\Models\Resume;
use App\Models\City;
use App\Models\Industry;
use Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;

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



        return view('consult.show',compact('consultant', $consultant));
            //->with('consultant',$consultant);

}


public function create()
    {
            $cities = City::all();
            $industries = Industry::all();
            return view('consult.create',['cities' => $cities, 'industries' => $industries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */

    public function store(Request $request)
    {
     //   dd($request);

        $consult = new Consult($request->all());
        $consult->save();
        return redirect('sconsult');
    }

}