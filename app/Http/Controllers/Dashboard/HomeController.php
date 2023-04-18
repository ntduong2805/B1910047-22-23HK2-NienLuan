<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\RoomBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends DashboardController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room_bookings = RoomBooking::with('room')
            ->where('user_id', Auth::user()->id)
            ->limit(5)
            ->orderBy('created_at', 'asc')
            ->get();
        $total_room_bookings = RoomBooking::where('user_id', Auth::user()->id)->count();
        $total_pending_payments = RoomBooking::where('user_id', Auth::user()->id)->where('payment', 0)->count();

        $room_booking_with_reviews = RoomBooking::whereHas('review', function($query){
            $query->where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->limit(5);
        })->get();
        return view('dashboard.home')->with([
            'room_bookings' => $room_bookings,
            'total_room_bookings' => $total_room_bookings,
            'total_pending_payments' => $total_pending_payments,
            'room_booking_with_reviews' => $room_booking_with_reviews,
        ]);
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
