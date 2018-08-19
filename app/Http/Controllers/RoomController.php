<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $room = new Room;
        
        $room->name = $request->input('name');
        $room->descripition = $request->input('descripition');
        $room->capacity = $request->input('capacity');
        $room->avaible_video_projector = $request->input('avaible_video_projector', 0);
        $room->avaible_AC = $request->input('avaible_AC', 0);      
        $room->avaible_seats = $request->input('avaible_seats');
        $room->seats_type = $request->input('seats_type');
        $room->location_id = $request->input('location_id');
        
        $room->save();
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
        $room = Room::find($id);

        $room->name = $request->input('name');
        $room->descripition = $request->input('descripition');
        $room->capacity = $request->input('capacity');
        $room->avaible_video_projector = $request->input('avaible_video_projector', 0);
        $room->avaible_AC = $request->input('avaible_AC', 0);      
        $room->avaible_seats = $request->input('avaible_seats');
        $room->seats_type = $request->input('seats_type');
        $room->location_id = $request->input('location_id');
        
        $room->save();
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
