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

class ConsultEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
      public function index(Request $request)
    {
        $consultations = TimeConsultation::get_consultations($request);
        $request->has('my')? $my = 1: $my = 0;
            if ($request->ajax()) {
                return view('event.index', ['consultations' => $consultations]);
            } else {
                return view('event._index', ['consultations' => $consultations, 'my'=>$my]);
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
        $consultant = Consult::with('timeConsults') -> find($id);
        $timecons =[];
            foreach ($consultant->timeConsults as $timeConsult)
                $timecons = $timeConsult;
        return view('event.edit', ['consultant'=> $consultant, 'cities' => $cities, 'industries' => $industries, 'timecons' => $timecons]);
    }
    public function update(Request $request, $id)
    {
     //   dd ($request);
        $consult = Consult::find($id);
        $consult->update($request ->all());
        $time_id=$request->get('time_id');
        $timeConsultation = TimeConsultation::find($time_id);
        $timeConsultation->update($request ->all());
        return redirect('events');
    }
    public function destroy($id)
    {
        $data = TimeConsultation::find($id);
        $data->confirmedConsultations()->delete();
        $data->delete();

//     dd ($data);
        return redirect('events');
    }
}