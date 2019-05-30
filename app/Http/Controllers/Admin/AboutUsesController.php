<?php

namespace App\Http\Controllers\Admin;

use App\Models\About_Us;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Storage;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use \Illuminate\Support\Facades\File;

class AboutUsesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $records = 20;

        $aboutUs = About_Us::paginate($records);
        return view('newDesign.admin.aboutUs.index',['aboutUses'=>$aboutUs]);
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
        $rules = [
            'title'               => 'required|max:255',
            'short_description'   => 'required',
            'description'         => 'required',
            'published'           => 'required',
            'year'                => 'required',
            'icon'                => 'required',
            'multi_files'         => 'required',
            'start_date'          => 'date_format:Y',
            'end_date'            => 'date_format:Y|after:start_date',
        ];

        $this->validate($request,$rules);
        $aboutUs = About_Us::create($request->all());
        $aboutUs->save();

        $insPhoto  = new Photo;
        $insPhoto->about_uses_id = $aboutUs->id;

        foreach ($request->all()["multi_files"] as $multi_file){

            // store images into database
            $insertMultiImages  = new Photo;
            $insertMultiImages->about_uses_id = $aboutUs->id;
            $insertMultiImages->image = $multi_file;
            $insertMultiImages->save();

            //store images in public folder
            $insertMultiImages->storeImages($multi_file,$aboutUs->id);
        }
        //store icon into our db
        $insPhoto->image = $request->all()["icon"];
        $insPhoto->save();

        //store icon in public folder
        $insPhoto->storeImages($request->all()["icon"],$aboutUs->id);
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
        $aboutUs = About_Us::find($id);
        return view('newDesign.admin.aboutUs.show',['aboutUs'=>$aboutUs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $aboutUs = About_Us::find($id);
        return view('newDesign.admin.aboutUs.edit',['aboutUs'=>$aboutUs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        $aboutUs = About_Us::find($id);
        $this->helperSave($aboutUs,$request);
        return redirect()->route('admin.about-us.index');
    }

    private function helperSave($aboutUs, $request){
        $input = $request->all();
        $aboutUs->fill($input)->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $record = About_Us::find($id);
        $record->delete();
        return redirect()->route('admin.about-us.index');
    }
}
