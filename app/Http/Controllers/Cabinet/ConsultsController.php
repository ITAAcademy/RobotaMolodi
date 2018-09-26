<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Requests\ConsultValid;
use Illuminate\Http\Request;
use App\Http\Requests;
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
use App\Models\User;
use App\Http\Controllers\EventsController;

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
        $consultData = $request->allData;
        $consult = new Consult;
        $consult->user_id = $consultData['user_id'];
        $consult->value = $consultData['value'];
        $consult->currency_id = $consultData['currency'];
        $consult->city = $consultData['city'];
        $consult->area = $consultData['area'];
        $consult->position = $consultData['position'];
        $consult->description = $consultData['description'];
        $consult->telephone = $consultData['telephone'];
        if(isset($consultData['resume'])){
            $consult->resume_id = $consultData['resume'];
        }
        $consult->save();
        foreach ($consultData['events'] as $event) {
            $timeConsultation = new TimeConsultation;
            $startSec = strtotime($event['start']);
            $endSec = strtotime($event['end']);
            $start = date('Y-m-d H:i:s', $startSec);
            $end = date('Y-m-d H:i:s', $endSec);
            $timeConsultation->consults_id = $consult->id;
            $timeConsultation->time_start = $start;
            $timeConsultation->time_end = $end;
            $timeConsultation->save();
        }
        return redirect('sconsult');
    }


}
