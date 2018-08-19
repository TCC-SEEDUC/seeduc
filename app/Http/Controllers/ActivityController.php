<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
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
        $activity = new Activity;

        $activity->name = $request->input('name');
        $activity->description = $request->input('description');
        $activity->beginning_date = $request->input('beginning_date');
        $activity->period = $request->input('period');
        $activity->minimum_quorum = $request->input('minimum_quorum');
        $activity->maximum_capacity = $request->input('maximum_capacity');
        $activity->event_id = $request->input('event_id');
        $activity->location_id = $request->input('location_id');
        $activity->bond_id = $request->input('public_id');
        $activity->room_id = $request->input('room');
        
        $activity->save();
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
        $activity = Activity::find($request->input('id'));
        $activity->room_id = $request->input('room_id');
        $activity->name = $request->input('name');
        $activity->description = $request->input('description');
        $activity->beginning_date = $request->input('beginning_date');
        $activity->period = $request->input('period');
        $activity->minimum_quorum = $request->input('minimum_quorum');
        $activity->maximum_capacity = $request->input('maximum_capacity');
        $activity->event_id = $request->input('event_id');
        $activity->location_id = $request->input('location_id');
        //$activity->bond_id = $request->input('bonds');
        $activity->description_speaker = $request->input('description_speaker');

        $activity->save();
        return redirect()->action('ActivityController@show');
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
        $activity->delete();
    }
}
