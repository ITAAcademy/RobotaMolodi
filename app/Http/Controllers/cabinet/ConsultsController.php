<?php

namespace App\Http\Controllers\cabinet;

use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use Auth;
use App\Models\Consult;
use App\Models\City;
use App\Models\Industry;
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
    public function index(){

    }
    public function create()
    {
        $cities = City::all();
        $industries = Industry::all();
        $resumes = Auth::user()->resumes()->orderBy('created_at', 'desc')->get();
        $currencies = Currency::all();
        return view('consult.create',
            ['cities' => $cities,
                'industries' => $industries,
                'currencies' => $currencies
            ])->with('resumes', $resumes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */

    public function store(Request $request)
    {
        $consult = new Consult($request->except(["time_start", "time_end"]));
        $consult->resume_id = $request->input('resume');
        $consult->value = $request->value;
        $consult->currency_id = $request->input('currency');
        $consult->save();
        //dd(array_merge($request->only(["time_start", "time_end"]), ["consult_id" => $consult->consult_id]) );

        $timeConsultation = new TimeConsultation(array_merge($request->only(["time_start", "time_end"]), ["consults_id" => $consult->id]));
        $timeConsultation->save();

        return redirect('sconsult');
    }
}
