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
        $events = Event::all();
        return Response($events, 200);
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
            'end_date' =>  'required|date',
        ]);

        $event = new Event;

        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->beginning_date = $request->input('beginning_date');
        $event->end_date = $request->input('end_date');

        if($event->save()){
            return Response($event, 200);
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
       $event = Event::find($id);
       return Response($event, 200);
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
            return Response($event, 200);
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
        $event = Event::findOrFail($id);
        if($event->delete()){
            return Response($event, 200);
        }
        return Response('Não foi possível realizar a operação', 500); 

    }
}
