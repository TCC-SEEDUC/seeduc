<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Event;
use App\Models\Schedule;
use App\Models\Room;
use App\Models\Location;
use App\Models\Bond;
use App\Models\Speaker;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities =  Activity::with('event', 'location', 'room', 'schedule')->get();
        return Response($activities, 200);
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
            'description' =>  'required',
            'beginning_date' =>  'required|date',
            'schedule_id' =>  'required|numeric',
            'event_id' =>  'required|numeric',
            'location_id' =>  'required|numeric',
            'room_id' =>  'required|numeric',
            'minimum_quorum' =>  'required|numeric',
            'maximum_capacity' =>  'required|numeric',
            'bond_id' =>  'numeric',
            'speaker_id' =>  'required|numeric',
        ]);
        //Inserir nas tabelas de resolução.
        #$activity->bond_id = $request->input('bond_id');
        #$activity->speaker_id = $request->input('speaker_id'); 
        $activity = new Activity;

        $activity->name = $request->input('name');
        $activity->description = $request->input('description');
        $activity->beginning_date = $request->input('beginning_date');
        $activity->schedule_id = $request->input('schedule_id');
        $activity->minimum_quorum = $request->input('minimum_quorum');
        $activity->maximum_capacity = $request->input('maximum_capacity');
        $activity->event_id = $request->input('event_id');
        $activity->location_id = $request->input('location_id');
        $activity->room_id = $request->input('room_id');

        if($activity->save()){
            return Response($activity, 200);
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
        $activity = Activity::with('event', 'location', 'room', 'schedule')->find($id);
        return Response($activity, 200);
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
        $activity = Activity::find($id);
        $this->validate($request, [
            'name' =>  'required',
            'description' =>  'required',
            'beginning_date' =>  'required|date',
            'schedule_id' =>  'required|numeric',
            'event_id' =>  'required|numeric',
            'location_id' =>  'required|numeric',
            'room_id' =>  'required|numeric',
            'minimum_quorum' =>  'required|numeric',
            'maximum_capacity' =>  'required|numeric',
            'bond_id' =>  'numeric',
            'speaker_id' =>  'required|numeric',
        ]);
        //Inserir nas tabelas de resolução.
        #$activity->bond_id = $request->input('bond_id');
        #$activity->speaker_id = $request->input('speaker_id'); 

        $activity->name = $request->input('name');
        $activity->description = $request->input('description');
        $activity->beginning_date = $request->input('beginning_date');
        $activity->schedule_id = $request->input('schedule_id');
        $activity->minimum_quorum = $request->input('minimum_quorum');
        $activity->maximum_capacity = $request->input('maximum_capacity');
        $activity->event_id = $request->input('event_id');
        $activity->location_id = $request->input('location_id');
        $activity->room_id = $request->input('room_id');
        

        return redirect()->action('ActivityController@index');

        if($activity->save()){
            return Response($activity, 200);
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
        $activity = Activity::findOrFail($id);
        if($activity->delete()){
            return Response('Atividade excluida com sucesso!', 200);
        }
        return Response('Não foi possível realizar a operação', 500); 
    }
}
