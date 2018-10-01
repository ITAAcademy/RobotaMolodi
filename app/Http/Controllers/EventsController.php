<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Consult;
//use App\Http\Controllers\Cabinet\ConsultsController;
use App\Models\TimeConsultation;


class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }


    public function show($id)
    {
        $timeConsultations = TimeConsultation::where('consults_id', $id)
            ->get();
        return response()->json($timeConsultations);
    }

    public function destroy(Request $request)
    {
        $timeId = $request->id;
        $time = TimeConsultation::find($timeId);
        $time->delete();
    }
}
