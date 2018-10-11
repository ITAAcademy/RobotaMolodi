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
use Illuminate\Support\Facades\Storage;


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
        $timeConsultations = TimeConsultation::where('consults_id', $id)->get();
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
        $resumes = Auth::user()->resumes()->orderBy('created_at', 'desc')->get();
        $currencies = Currency::all();
        $consultant = Consult::find($id);
//        dd($consultant);
        return view('event.edit',
            ['consultant'=> $consultant,
            'cities' => $cities,
            'industries' => $industries,
            'resumes' => $resumes,
            'currencies' => $currencies]);
    }

    public function update(ConsultValid $request, $id)
    {

        $consultData = $request->all();
        $consult = Consult::find($id);
        if(isset($consultData['resume'])){
            $consult->resume_id = $consultData['resume'];
        }
        $consult->update($request ->all());
  //      dd($request->all());
        $events = json_decode($consultData['events'], true);
        if(isset($consultData['events'])) {
            foreach ($events as $event) {
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
        if (isset($consultData['img'])) {
            $file = $request->file('img');
            $filename = Auth::user()->id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $directory = 'image/user/' . Auth::user()->id . '/avatar/';
            Storage::makeDirectory($directory);
            Storage::put($directory . $filename, file_get_contents($file));
            $user = Auth::user();
            $user->avatar = $directory.$filename;
            $user->save();
        }
    }
    public function destroy($id)
    {
        $data = TimeConsultation::find($id);
        $data->confirmedConsultations()->delete();
        $data->delete();
        return redirect('events');
    }
}