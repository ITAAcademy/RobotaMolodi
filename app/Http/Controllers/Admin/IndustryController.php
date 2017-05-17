<?php

namespace App\Http\Controllers\Admin;

use App\Models\Industry;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $industries = Industry::all();
        return view('newDesign.admin.industries.index', ['industries' => $industries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $industry = new Industry();
        return view('newDesign.admin.industries.create', ['industry' => $industry]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $industry = new Industry($request->all());
        $industry->save();

        return redirect()->route('admin.industry.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $industry = Industry::find($id);
        return view('newDesign.admin.industries.edit', ['industry' => $industry]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $industry = Industry::find($id);
        $industry->fill($request->all());
        $industry->save();

        return redirect()->route('admin.industry.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Industry::destroy($id);
        return redirect()->route('admin.industry.index');
    }
    
    public function setMainIndustry(Request $request){
        Industry::where('main', true)->update(array('main' => false));
        return Industry::where('id', $request->id)->update(array('main' => true));
    }
}
