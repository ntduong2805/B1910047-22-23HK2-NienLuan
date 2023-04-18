<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\RoomBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ReviewController extends DashboardController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $room_booking = RoomBooking::findOrFail($id);
        return view('dashboard.booking.review', compact('room_booking'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $room_booking = RoomBooking::findOrFail($id);
        $rules = [
            'review' => 'max:200',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        } else {
            $review = Review::updateOrCreate(
                ['room_booking_id' => $id],
                [
                    'review' => $request->input('review'),
                    'rating' => $request->input('rating')?$request->input('rating'):0,
                    'approval_status' => "pending",
                ]
            );

            Session::flash('flash_title', "Success");
            Session::flash('flash_message', "Review has been updated.");

            return redirect()->route('dashboard.room');
        }
        
    }
    public function test(Request $reuqest, $id)
    {
        return view('dashboard.booking.test')->with([
            'request' => $reuqest->all(),
            'id' => $id
        ]);
    }
}
