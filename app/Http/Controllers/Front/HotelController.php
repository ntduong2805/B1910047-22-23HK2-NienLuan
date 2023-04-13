<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Review;
use App\Models\RoomType;
use App\Models\Slider;
use Illuminate\Http\Request;

class HotelController extends FrontContronller
{
    public function __construct()
    {
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider_images = Slider::where('status', 1)->get();
        $roomtypes = RoomType::whereHas('images', function ($query){
           $query->where('is_primary', true);
        })->with([
            'images' => function($query){
            $query->where('is_primary', true)->where('status', true);
        },
            'rooms' => function($query){
                $query->where('status', true);
            }])
            ->where('status', 1)
            ->orderBy('id', 'asc')
            ->get();
        
        $reviews = Review::where('approval_status', "approved")
            ->orderBy('updated_at', 'desc')
            ->limit('4')
            ->get();
        $images = Image::all();
        
        return view('front.home')->with([
            'slider_images' => $slider_images,
            'roomtypes' => $roomtypes,
            'reviews' => $reviews,
            'images' => $images,
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
