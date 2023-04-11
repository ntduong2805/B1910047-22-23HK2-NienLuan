<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic;

class SliderController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index')->with('sliders', $sliders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'small_title' => 'max:30',
            'big_title' => 'max:30',
            'description' => 'max:200',
            'link' => 'max:100',
            'link_text' => 'max:15',
            'status' => 'required|boolean'
        ];

        if (!empty($request->input('image'))) {
            $rules['image'] = 'mimes:jpeg,jpg,png';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        } else {

            $slider = new Slider();
            $slider->small_title = $request->input('small_title');
            $slider->big_title = $request->input('big_title');
            $slider->description = $request->input('description');
            $slider->link = $request->input('link');
            $slider->link_text = $request->input('link_text');
            $slider->status = $request->input('status');

            // Image Upload
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('','sliders');
                $slider_image = ImageManagerStatic::make('storage/sliders/'.$path);
                $slider_image->fit(1200, 500);
                $slider_image->save(storage_path().'/app/public/sliders/'.$path);

                $slider->name = $path;
            }
            $slider->save();

            Session::flash('flash_title', "Success");
            Session::flash('flash_message', "Image has been added to the slider. You can add more images from the form below.");
            return redirect()->route('admin.slider.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $silder = Slider::find($id);
        return view('admin.slider.edit')->with('slider', $silder);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $rules = [
            'small_title' => 'max:30',
            'big_title' => 'max:30',
            'description' => 'max:200',
            'link' => 'max:100',
            'link_text' => 'max:15',
            'status' => 'required|boolean'
        ];

        if(!empty($request->input('image'))){
            $rules['image'] = 'mimes:jpeg,jpg,png';
        }

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator)
                ->with('image', $slider);
        }
        $slider->small_title = $request->input('small_title');
        $slider->big_title = $request->input('big_title');
        $slider->description = $request->input('description');
        $slider->link = $request->input('link');
        $slider->status = $request->input('status');

        if($request->hasFile('image')){
            Storage::delete('public/slider/'.$slider->name);

            $path = $request->file('image')->store('','slider');
            $slider_image = ImageManagerStatic::make('storage/slider/'.$path);
            $slider_image->fit(1200, 500);
            $slider_image->save(storage_path().'/app/public/slider/'.$path);

            $slider->name = $path;
        }
        $slider->save();
        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'Image has been updated');
        return redirect()->route('admin.slider.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        if($slider->delete()){
            Storage::delete('public/sliders/'.$slider->name);
            Session::flash('flash_title', 'Success');
            Session::flash('flash_message', 'Image has been deleted');
            return redirect()->route('admin.slider.index');
        }
        return redirect()
            ->back()
            ->withErrors(array('message' => 'Sorry, the image could not be deleted.'));
    }
}
