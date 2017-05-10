<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sliders = Slider::all();
        
        return view('newDesign.admin.sliders.index', ['sliders' => $sliders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('newDesign.admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $slider = new Slider($request->all());
        
        if(Input::file('image')) {
            $file = Input::file('image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $directory = 'image/sliders/';
            Storage::makeDirectory($directory);
            $file->move($directory, $filename);
            $slider->image = $directory.$filename;
        }
        
        $slider->save();
        
        return redirect()->route('admin.slider.index');
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
        $slider = Slider::find($id);
        
        return view('newDesign.admin.sliders.edit', ['slider' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $slider = Slider::find($id);
        $input = $request->all();
        $slider->fill($input);

        if(Input::file('image')){
            $file = Input::file('image');
            $filename = time().'-'.$file->getClientOriginalName();
            $directory = 'image/sliders/';
            $file->move($directory, $filename);
            $slider->image = $directory.$filename;
        }

        $slider->save();

        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Slider::destroy($id);

        return redirect()->route('admin.slider.index');
    }
}
