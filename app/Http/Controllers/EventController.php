<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Event::All(),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
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
            'end_date' =>  'required|date',
        ]);

        $event = new Event;

        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->beginning_date = $request->input('beginning_date');
        $event->end_date = $request->input('end_date');

        if($event->save()){
            return response($event,200);
        }
        return response('Falhou',400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('event.show', ['event' => Event::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('event.edit', ['event' => Event::find($id)]);
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
        $event = Event::find($id);
        
        $this->validate($request, [
            'name' =>  'required',
            'description' =>  'required',
            'beginning_date' =>  'required',
            'end_date' =>  'required',
        ]);

        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->beginning_date = $request->input('beginning_date');
        $event->end_date = $request->input('end_date');

        if($event->save()){
            return redirect()->action('EventController@index'); 
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
        $event = Event::findOrFail($id);
        $deleted = $event->delete();
        if($deleted){
            return response($event,200);
        }
        return response('Falhou',400);
    }
}
