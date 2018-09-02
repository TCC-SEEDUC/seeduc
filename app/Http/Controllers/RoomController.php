<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Location;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('room.index', ['rooms' => Room::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room.create', ['locations' => Location::pluck('name', 'id')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>  'required',
            'capacity' =>  'required',
            'seats_type' =>  'required',
            'location_id' =>  'required',
        ]);

        $room = new Room;
        
        $room->name = $request->input('name');
        $room->description = $request->input('description');
        $room->capacity = $request->input('capacity');
        $room->available_video_projector = $request->input('available_video_projector', 0);
        $room->available_AC = $request->input('available_AC', 0);      
        $room->available_seats = $request->input('available_seats');
        $room->seats_type = $request->input('seats_type');
        $room->location_id = $request->input('location_id');
        
        if($room->save()){
            return redirect()->action('RoomController@index'); 
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
        return view('room.show', ['room' => Room::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('room.edit', ['room' => Room::find($id), 'locations' => Location::pluck('name', 'id')]);
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
        $this->validate($request, [
            'name' =>  'required',
            'capacity' =>  'required',
            'seats_type' =>  'required',
            'location_id' =>  'required',
        ]);
        
        $room = Room::find($id);

        $room->name = $request->input('name');
        $room->description = $request->input('description');
        $room->capacity = $request->input('capacity');
        $room->available_video_projector = $request->input('available_video_projector', 0);
        $room->available_AC = $request->input('available_AC', 0);      
        $room->available_seats = $request->input('available_seats');
        $room->seats_type = $request->input('seats_type');
        $room->location_id = $request->input('location_id');
        
        if($room->save()){
            return redirect()->action('RoomController@index'); 
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->action('RoomController@index');
    }
}
