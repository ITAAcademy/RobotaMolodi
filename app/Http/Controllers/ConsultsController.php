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
    public function index(Request $request)
    {
//        if ($request->ajax()) {
//            return view('newDesign.consults.consultsList', ['resumes' => $resumes]);
//        }
        return view('newDesign.consults.consultsList');
    }


    public function showConsult(Request $request)
    {
       // return view('consult.show');
    }

    public function show($id)
    {

        return view('consult.show');

    }
}