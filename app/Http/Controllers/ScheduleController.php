<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();
        return Response($schedules, 200);
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
            'begin_at' =>  'required',
            'finish_at' =>  'required',
        ]);

        $schedule = new Schedule;

        $schedule->name = $request->input('name');
        $schedule->begin_at = $request->input('begin_at');
        $schedule->finish_at = $request->input('finish_at');

        if($schedule->save()){
            return Response($schedule, 200);
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
        $schedule = Schedule::find($id);
        return Response($schedule, 200);
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
        $schedule = Schedule::find($id);

        $this->validate($request, [
            'name' =>  'required',
            'begin_at' =>  'required',
            'finish_at' =>  'required',
        ]);

        $schedule->name = $request->input('name');
        $schedule->begin_at = $request->input('begin_at');
        $schedule->finish_at = $request->input('finish_at');

        if($schedule->save()){
            return Response($schedule, 200);
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
        $schedule = Schedule::findOrFail($id);
        if($schedule->delete()){
            return Response('Horário excluido com sucesso!', 200);
        }
        return Response('Não foi possível realizar a operação', 500); 
    }
}
