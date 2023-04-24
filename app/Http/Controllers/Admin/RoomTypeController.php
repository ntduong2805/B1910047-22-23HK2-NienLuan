<?php

namespace App\Http\Controllers\Admin;

use App\Models\Facility;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RoomTypeController extends AdminController
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
        $roomtypes = RoomType::all();
        return view('admin.roomtype.index')->with('roomtypes', $roomtypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facilities = Facility::all();
        return view('admin.roomtype.create')->with('facilities', $facilities);
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
            'name' => 'required|max:50|unique:room_types,name',
            'cost_per_day' => 'required|numeric|min:0',
            'size' => 'numeric|min:0',
            'discount_percentage' => 'integer|between:0,100',
            'max_adult' => 'integer|min:1',
            'max_child' => 'numeric',
            'description' => 'max:800',
            'facility' => 'array',
            'room_service' => 'boolean',
            'status' => 'required|boolean'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        $roomtype = new RoomType();
        $roomtype->name = $request->input('name');
        $roomtype->cost_per_day = $request->input('cost_per_day');
        $roomtype->size = $request->input('size');
        $roomtype->discount_percentage = $request->input('discount_percentage');
        $roomtype->max_adult = $request->input('max_adult');
        $roomtype->max_child = $request->input('max_child');
        $roomtype->description = $request->input('description');
        $roomtype->room_service = $request->input('room_service');
        $roomtype->status = $request->input('status');
        $roomtype->save();

        if($request->has('facility')){
            $roomtype->facilities()->attach(array_keys($request->input('facility')));
        }

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The roomtype has been added successfully');
        return redirect()->route('admin.roomtype.index');
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
        $facilities = Facility::all();
        $rommtype = RoomType::find($id);
        return view('admin.roomtype.edit')->with([
            'facilities' => $facilities,
            'roomtype' => $rommtype,
        ]);
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
        $roomtype = RoomType::find($id);
        $rules = [
            'name' => 'required|max:50|unique:room_types,name,'.$id,
            'cost_per_day' => 'required|numeric|min:0',
            'size' => 'numeric|min:0',
            'discount_percentage' => 'integer|between:0,100',
            'max_adult' => 'numeric',
            'max_child' => 'numeric',
            'description' => 'max:800',
            'facility' => 'array',
            'room_service' => 'boolean',
            'status' => 'required|boolean'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        $roomtype->name = $request->input('name');
        $roomtype->cost_per_day = $request->input('cost_per_day');
        $roomtype->size = $request->input('size');
        $roomtype->discount_percentage = $request->input('discount_percentage');
        $roomtype->max_adult = $request->input('max_adult');
        $roomtype->max_child = $request->input('max_child');
        $roomtype->description = $request->input('description');
        $roomtype->room_service = $request->input('room_service');
        $roomtype->status = $request->input('status');
        $roomtype->save();

        $roomtype->facilities()->sync(array_keys($request->input('facility')));

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The roomtype has been updated successfully');
        return redirect()->route('admin.roomtype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room_type = RoomType::find($id);

        // Delete rooms
        // foreach ($room_type->room as $room) {
        //     // Delete room bookings
        //     foreach ($room->room_bookings as $booking) {
        //         $booking->delete();
        //     }
        //     $room->delete();
        // }

        // Delete images
        // foreach ($room_type->images as $image) {
        //     if ($image->delete()) {
        //         if (Storage::disk('roomtypes')->exists($image->name)) {
        //             Storage::delete('public/roomtypes/' . $image->name);
        //         }
        //     }
        // }
        // TO_DO_DEM Clear all Facilities by Eloquent remove pivot records

        $room_type->delete();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The room_type has been deleted successfully');
        return redirect()->route('admin.roomtype.index');
    }
}
