<?php

namespace App\Http\Controllers\Admin;


use App\Models\AboutUs;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AboutsUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $aboutsUs = AboutUs::all();

        return view('newDesign.admin.aboutUs.index',['aboutsUs'=>$aboutsUs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('newDesign.admin.aboutUs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
       AboutUs::create($request->all());

       return redirect()->route('admin.about-us.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $aboutsUs = AboutUs::find($id);
        return view('newDesign.admin.aboutUs.show', ['aboutUs' => $aboutsUs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $aboutsUs = AboutUs::find($id);

        return view('newDesign.admin.aboutUs.edit', ['aboutUs' => $aboutsUs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
              'title'             => 'required'
            , 'short_description' => 'required'
            , 'description'       => 'required'
            , 'year'              => 'required'
            , 'published'         => 'required'
        ]);

        $aboutsUs = AboutUs::find($id);
        $aboutsUs->fill($request->all());
        $aboutsUs->save();
        return redirect()->route('admin.about-us.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        AboutUs::find($id)->delete();
        return redirect()->route('admin.about-us.index');
    }
}
