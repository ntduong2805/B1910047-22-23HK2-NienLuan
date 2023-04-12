<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RoomController extends AdminController
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
    public function index($id)
    {
        $roomtype = RoomType::find($id);
        return view('admin.room.index')->with('roomtype', $roomtype);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $roomtype = RoomType::find($id);
        return view('admin.room.create')->with('roomtype', $roomtype);
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
            'room_number' => 'required|numeric|max:99999|unique:rooms,room_number',
            'description' => 'max:200',
            'status' => 'boolean|required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        } else {
            $roomtype = RoomType::find($id);
            $room = new Room();
            $room->room_number = $request->input('room_number');
            $room->description = $request->input('description');
            $room->status = $request->input('status');

            $room->room_type()->associate($roomtype);
            $room->save();

            Session::flash('flash_title', "Success");
            Session::flash('flash_message', "Room has been added. Add more rooms.");

            return redirect()->route('admin.roomtype.room.index', $id);
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
    public function edit($id, $room_id)
    {
        $roomtype = RoomType::find($id);
        $room = Room::find($room_id);
        return view('admin.room.edit')
            ->with('roomtype', $roomtype)
            ->with('room', $room);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $room_id)
    {
        $rules = [
            'room_number' => 'required|numeric|max:99999|unique:rooms,room_number,'.$room_id,
            'description' => 'max:200',
            'status' => 'boolean|required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        } else {
            $room = Room::find($room_id);
            $room->room_number = $request->input('room_number');
            $room->description = $request->input('description');
            if($request->has('available')){
                $room->available = $request->input('available');
            }
            $room->status = $request->input('status');
            $room->save();

            Session::flash('flash_title', "Success");
            Session::flash('flash_message', "Room has been updated.");

            return redirect()->route('admin.roomtype.room.index', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $room_id)
    {
        $room = Room::findOrFail($room_id);

        //Delete room bookings
        foreach ($room->room_bookings as $booking) {
            $booking->delete();
        }

        if($room->delete()){

            Session::flash('flash_title', 'Success');
            Session::flash('flash_message', 'Room has been deleted');

            return redirect()->route('admin.roomtype.room.index', $id);
        }
        return redirect()
            ->back()
            ->withErrors(array('message' => 'Sorry, the room could not be deleted.'));
    }
}
