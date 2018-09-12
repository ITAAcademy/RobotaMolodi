<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Currency;
use App\Models\Consult;
use App\Models\City;
use App\Models\Industry;
use Illuminate\Http\Request;
use App\Models\TimeConsultation;
use App\Models\Resume;

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
        self::validateData($request);
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



    public function destroy($id)
    {
        $data = Consult::find($id);

            $data->timeConsult()->delete();
            $data->delete();
        return redirect('events');
    }

    public function validateData(Request $request){
        $validateFields = array([
            'telephone' => 'required|integer',
            'value' => 'required|integer',
            'position' => 'required|max:255',
            'description' => 'required|max:255',
            'time_start' => 'required|date',
            'time_end' => 'required|date|after:time_start',
//            'resume' => 'required'
        ]);
        $this->validate($request, $validateFields);
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