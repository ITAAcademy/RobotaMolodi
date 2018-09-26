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
    const PER_PAGE = 5;
    public function index(Request $request)
    {
        $filter = [
            'my' => 'my'
        ];
        $filter1 = [
            'conf' => 'conf'
        ];
        $consultant = Consult:: where('consult_id', '=', Auth::User()->id)
                ->with('timeConsults')
                ->with('confirmedConsultations')
                ->paginate(self::PER_PAGE);
        $consultations = ConfirmedConsultation:: where('user_id', '=', Auth::User()->id)
            ->with('timeConsultation')
            ->with('consultants')
            ->paginate(self::PER_PAGE);
         //  dd($consultations);
        $consultants = Consult::all();
//dd($filter1);
        if ($request->has($filter1)) {
            return view('event._index', ['consultant' => $consultant, 'filter'=> $filter]);
        }
        elseif($request->has($filter)){
            return view('event._index_', ['consultants' => $consultants, 'consultations'=> $consultations]);
        }
        else{
            if ($request->ajax()) {
                return view('event.index')->with('consultant', $consultant);

            } else {
                return view('event._index', ['consultant' => $consultant, 'filter'=> '0']);
            }
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
        $data = Consult::find($id);
        $data->confirmedConsultations()->delete();
        $data->timeConsults()->delete();
        $data->delete();

//     dd ($data);
        return redirect('events');
    }
}
