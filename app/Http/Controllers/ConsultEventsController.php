<?php

namespace App\Http\Controllers;

use App\Models\ConfirmedConsultation;
//use Request;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreConfirmConsultation;
use App\Http\Controllers\Controller;
use App\Models\Consult;
use App\Models\TimeConsultation;
use Illuminate\Support\Facades\Auth;
use App\Models\City;
use App\Models\Industry;
use App\Models\Currency;
use App\Http\Requests\ConsultValid;


class ConsultEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    const PER_PAGE = 5;
    public function index(Request $request)
    {
        $consultant = Consult:: where('user_id', '=', Auth::User()->id)
            ->with('timeConsult')
            ->paginate(self::PER_PAGE);

        //      dd($consultant);
        if ($request->ajax()) {
            return view('event.index')->with('consultant', $consultant);

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

    public function store(StoreConfirmConsultation $request)
    {
        $confirmedCons = ConfirmedConsultation::create($request->all());
        $confirmedCons->user_id = Auth::user()->id;
        $confirmedCons->save();
        return json_encode("Registration completed successfully.");
    }
    public function edit($id)
    {
        $cities = City::all();
        $industries = Industry::all();
        $consultant = Consult::with('timeConsult') -> find($id);
        $resumes = Auth::user()->resumes()->orderBy('created_at', 'desc')->get();
        $currencies = Currency::all();
        $timecons =[];
        foreach ($consultant->timeConsult as $timeConsult)
            $timecons = $timeConsult;
        return view('event.edit',
            ['consultant'=> $consultant,
            'cities' => $cities,
            'industries' => $industries,
            'timecons' => $timecons,
            'resumes' => $resumes,
            'currencies' => $currencies]);
    }
    public function update(ConsultValid $request, $id)
    {
        $consultData = $request->allData;
        $consult = Consult::find($id);
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

        if(isset($consultData['events'])) {
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
        }
    }

    public function destroy($id)
    {
        $data = Consult::find($id);
        $data->delete();
        return redirect('events');
    }
}
