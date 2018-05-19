<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreSliderRequest;
use App\Services\ImageCompress;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Category;
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
        $sliders = Slider::orderBy('category_id')->orderBy('position', 'desc')->get();
        $categories = Category::all();
        
        return view('newDesign.admin.sliders.index', [
            'sliders' => $sliders,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('newDesign.admin.sliders.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreSliderRequest $request)
    {

        $slider = new Slider($request->all());
        $category = Category::find($slider->category_id);

        if(Input::file('image')) {
            $file = Input::file('image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $directory = $slider->getPath();
            Storage::makeDirectory($directory);
            $file->move($directory, $filename);
            $slider->image = $directory.$filename;
            #ImageCompress::tinifyImage($slider->image);
        }
        
        $category->number_of_positions++;
        $category->save();
    
        $slider->position = $slider->category->number_of_positions;
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
        $slider = Slider::find($id);
        
        return view('newDesign.admin.sliders.show', ['slider' => $slider]);
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
        $categories = Category::all();
        
        return view(
            'newDesign.admin.sliders.edit',
            [
                'slider' => $slider,
                'categories' => $categories
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, StoreSliderRequest $request)
    {
        $slider = Slider::find($id);
        $input = $request->all();
        $slider->fill($input);

        if(Input::file('image')){
            $file = Input::file('image');
            $filename = time().'-'.$file->getClientOriginalName();
            $directory = $slider->getPath();
            $file->move($directory, $filename);
            $slider->image = $directory.$filename;
            #ImageCompress::tinifyImage($slider->image);
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
        $slider = Slider::find($id);
        $category = Category::find($slider->category_id);
    
        if($slider->position){
            $slider->shiftPositions();
            $category->number_of_positions--;
            $category->save();
        }
        
        if(file_exists($slider->image)){
            unlink($slider->image);
            $slider->destroy($id);
        }
        
        return redirect()->route('admin.slider.index');
    }
    
    public function saveCategory(Request $request){
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return 'Категорія була успішно створена';
    }
    
    public function updatePublished($slider_id){
        $chosenSlider = Slider::find($slider_id);
        $chosenSlider->published = !$chosenSlider->published;
        $chosenSlider->save();
        return $chosenSlider;
    }
    
    public function positionUp($id){
        $currentSlider = Slider::find($id);
        
        if($currentSlider->position == 0) {
            $category = Category::find($currentSlider->category_id);
            $currentSlider->position = ++$category->number_of_positions;
            $category->save();
        } else {
            $currentSlider->position++;
            $nextPositionSlider = $currentSlider->neededSibling();
            $nextPositionSlider->position--;
            $nextPositionSlider->save();
        }
        
        $currentSlider->save();
        return redirect()->back();
    }
    
    public function positionDown($id){
        $currentSlider = Slider::find($id);

        $currentSlider->position--;
        $previousPositionSlider = $currentSlider->neededSibling();
        $previousPositionSlider->position++;
    
        $previousPositionSlider->save();
        $currentSlider->save();
        return redirect()->back();
    }
    
    
}
