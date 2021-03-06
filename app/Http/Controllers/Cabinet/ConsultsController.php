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
use Illuminate\Support\Facades\Storage;
use File;

class ConsultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
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
    public function store(ConsultValid $request)
    {
        $consultData = $request->all();
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

        $consult = new Consult($consultData);
        if (isset($consultData['resume_id'])) {
            $consult->resume_id = $consultData['resume_id'];
        }
        $consult->save();
        $events = json_decode($consultData['events'], true);
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
        return json_encode($request);
    }

    public function destroy($id)
    {
        $data = TimeConsultation::find($id);
        $data->confirmedConsultations()->delete();
        return redirect('events');
    }
}