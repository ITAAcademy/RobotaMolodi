<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\SeoInfo;

class SeoModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $infos = SeoInfo::all();

        return view('newDesign.admin.seo-module.index',['infos' => $infos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        return view('newDesign.admin.seo-module.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required|unique:seo_infos',
            'title' => 'required|max:60|',
            'description' => 'required|min:70|max:300'
        ]);

        SeoInfo::create($request->all());
        return redirect('/admin/seo-module')
            ->with('flash_message','Seo info createded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $info = SeoInfo::findOrFail($id);

        return view('newDesign.admin.seo-module.show',['info' => $info]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $info = SeoInfo::findOrFail($id);

        return view('newDesign.admin.seo-module.edit',['info' => $info]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $info = SeoInfo::findOrFail($id);

        $this->validate($request, [
            'url' => 'required|unique:seo_infos,url,'.$id,
            'title' => 'required|max:60|',
            'description' => 'required|min:70|max:300'
        ]);

        $info->update($request->all());

        return redirect('/admin/seo-module')
            ->with('flash_message','Seo info updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        SeoInfo::findOrFail($id)->delete();
        return redirect()->route('admin.seo-module.index')
            ->with('flash_message','Seo info deleted successfully');
    }
}
