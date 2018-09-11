<?php

namespace App\Http\Controllers;

use App\Models\ConfirmedConsultation;
//use Request;
use Illuminate\Http\Request;

use App\Http\Requests;
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
    const PER_PAGE = 5;
    public function index(Request $request)
    {
        $consultant = Consult:: where('consult_id', '=', Auth::User()->id)
            ->with('timeConsult')
            ->paginate(self::PER_PAGE);
//        $timeConsult= TimeConsultation::all();
        //      dd($consultant);
        if ($request->ajax()) {
            return view('event.index')->with('consultant', $consultant);
//            , 'timeConsult', $timeConsult
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

    public function store(Request $request)
    {


      $confirmedCons = ConfirmedConsultation::create($request->all());
      $confirmedCons->user_id = Auth::user()->id;
      $confirmedCons->save();

        return json_encode("Registration completed successfully.") ;
    }
    public function edit($id)
    {
        $cities = City::all();
        $industries = Industry::all();
        $consultant = Consult::with('timeConsult') -> find($id);
        return view('event.edit', ['consultant'=> $consultant, 'cities' => $cities, 'industries' => $industries]);
    }
    public function update(Request $request, $id)
    {
        //   dd ($request);
        $consult = Consult::find($id);
        $consult->telephone=$request->get('telephone');
        $consult->city=$request->get('city');
        $consult->area=$request->get('area');
        $consult->position=$request->get('position');
        $consult->description=$request->get('description');
        $consult->save();
        $time_id=$request->get('time_id');
        $timeConsultation = TimeConsultation::find($time_id);
        $timeConsultation->time_start = $request->get('time_start');
        $timeConsultation->time_end = $request->get('time_end');
        $timeConsultation->save();
        return redirect('events');
    }
    public function destroy($id)
    {
        $data = Consult::find($id);
//       dd ($data);
        $data->timeConsult()->delete();
        $data->delete();
        return redirect('events');
    }
}
