<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic;

class ImageController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $roomtype = RoomType::find($id);
        return view('admin.image.index')->with('roomtype', $roomtype);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $roomtype = RoomType::find($id);
        return view('admin.image.create')->with('roomtype', $roomtype);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $rules = [
            'caption' => 'max:30',
            'image' => 'required|mimes:jpeg, jpg, png',
            'is_primary' => 'required',
            'status' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        } else {
            $image = new Image();
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('', 'roomtypes');
                $room_type_image = ImageManagerStatic::make('storage/roomtypes/' . $path);
                $room_type_image->fit(950, 400);
                $room_type_image->save(storage_path() . '/app/public/roomtypes/' . $path);
                $image->name = $path;
            }

            $image->caption = $request->input('caption');
            $image->is_primary = $request->input('is_primary');
            // if($image->is_primary == true){
            //     $this->set_is_primary_false($id);
            // }

            $image->status = $request->input('status');
            $image->room_type_id = $id;
            $image->save();

            Session::flash('flash_title', "Success");
            Session::flash('flash_message', "Photo has been added to the room gallery. Add more images.");

            return redirect()->route('admin.roomtype.image.index', $id);
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
    public function edit($id, $image_id)
    {
        $roomtype = RoomType::find($id);
        $image = Image::find($image_id);
        return view('admin.image.edit')
            ->with('roomtype', $roomtype)
            ->with('image', $image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $image_id)
    {
        $rules = [
            'caption' => 'max:30',
            'is_primary' => 'required',
            'status' => 'required'
        ];
        if ($request->hasFile('image')) {
            $rules['image'] = 'mimes:jpeg,jpg,png';
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        } else {

            $image = Image::find($image_id);
            if ($request->hasFile('image')) {
                Storage::delete('public/roomtypes/'.$image->name);

                $path = $request->file('image')->store('', 'roomtypes');
                $room_type_image = ImageManagerStatic::make('storage/roomtypes/' . $path);
                $room_type_image->fit(950, 400);
                $room_type_image->save(storage_path() . '/app/public/roomtypes/' . $path);
                $image->name = $path;
            }
            $image->caption = $request->input('caption');
            $image->is_primary = $request->input('is_primary');
            // if($image->is_primary == true){
            //     $this->set_is_primary_false($id);
            // }
            $image->status = $request->input('status');
            $image->save();

            Session::flash('flash_title', "Success");
            Session::flash('flash_message', "Photo has been updated.");

            return redirect()->route('admin.roomtype.image.index', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $image_id)
    {
        $image = Image::findOrFail($image_id);
        if($image->delete()){
            Storage::delete('public/roomtypes/'.$image->name);

            Session::flash('flash_title', 'Success');
            Session::flash('flash_message', 'Image has been deleted');

            return redirect()->route('admin.roomtype.image.index', $id);
        }
        return redirect()
            ->back()
            ->withErrors(array('message' => 'Sorry, the image could not be deleted.'));
    }
}
