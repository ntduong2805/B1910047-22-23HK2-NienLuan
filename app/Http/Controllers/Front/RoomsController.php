<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomsController extends FrontContronller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Lay roomtypes voi roomtype co image['is_primary' => true]  
        $roomtypes = RoomType::whereHas('images', function($query){
            $query->where('is_primary', true);
            //Lay image 
        })->with([
            'images' => function($query){
                $query->where('is_primary', true)->where('status', true);
            },
            //Lay facilities
            'facilities' => function($query){
                $query->where('status', true);
            }
        ])->where('status', 1)->orderBy('id', 'asc')->get();
        return view('front.rooms.index', compact('roomtypes'));
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
        $roomtype = RoomType::with([
            'images' => function($roomQuery) {
                $roomQuery->where('status', true);
            },
            'rooms.reviews' =>function($roomQuery) {
                $roomQuery->where('status', 'approved');
            }
        ])->where('status', true)->findOrFail($id);

        return view('front.rooms.show',compact('roomtype'));
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
