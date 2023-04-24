<?php

namespace App\Http\Controllers\Front;

use App\Book\Booking;
use App\Http\Controllers\Controller;
use App\Models\RoomBooking;
use App\Models\RoomType;
use App\Rules\RoomAvailableRule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function book(Request $request, $id)
    {
        //Check user
        if(!Auth::check())
        {
            return Redirect::to('/login');
        }
        $rules = [
            'number_of_adult' => 'required|numeric|min:1',
            'number_of_child' => 'required|numeric|min:0',
            'arrival_date' => 'required|date|date_format:Y/m/d|after_or_equal:today',
            'departure_date' => 'required|date|date_format:Y/m/d|after_or_equal:'.$request->input('arrival_date'),
        ];
        $roomtype = RoomType::findOrFail($id);
        $new_arrival_date = $request->input('arrival_date');
        $new_departure_date = $request->input('departure_date');
        $rules['booking_validation'] = [new RoomAvailableRule($roomtype, $new_arrival_date, $new_departure_date)];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }
        $room_booking = new RoomBooking();
        $user = Auth::user();

        $room_booking->arrival_date = $request->input('arrival_date');
        $room_booking->departure_date = $request->input('departure_date');

        $startTime = Carbon::parse($room_booking->arrival_date);
        $finishTime = Carbon::parse($room_booking->departure_date);
        $no_of_days = $finishTime->diffInDays($startTime) ? $finishTime->diffInDays($startTime) : 1;
        $room_booking->room_cost = $no_of_days * $roomtype->finalPrice;
        $room_booking->user_id = $user->id;
        $booking = new Booking($roomtype, $new_arrival_date, $new_departure_date);
        $room_booking->room_id = $booking->available_room_number();
        $room_booking->user_id = $user->id;
        $room_booking->save();
        Session::flash('flash_title', "Success");
        Session::flash('flash_message', "Room has been Booked");
        return redirect()->route('dashboard');
    }   
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
