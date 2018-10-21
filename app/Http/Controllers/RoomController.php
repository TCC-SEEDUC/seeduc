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
        $rooms = Room::all();
        return Response($rooms, 200);
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
            return Response($room, 200);
        }
        return Response('Não foi possível realizar a operação', 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::find($id);
        return Response($room, 200);
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
            return Response($room, 200);
        }
        return Response('Não foi possível realizar a operação', 500);
        
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
        if($room->delete()){
            return Response('Sala excluida com sucesso!', 200);
        }
        return Response('Não foi possível realizar a operação', 500); 
    }
}
