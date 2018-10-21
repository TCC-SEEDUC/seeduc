<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speaker;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $speakers = Speaker::all();
        return Response($speakers, 200);
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
            'type' =>  'required',
        ]);

        $speaker = new Speaker;

        $speaker->name = $request->input('name');
        $speaker->type = $request->input('type');
        $speaker->linkedin = $request->input('linkedin');
        $speaker->facebook = $request->input('facebook');
        $speaker->twitter = $request->input('twitter');
        $speaker->small_desc = $request->input('small_desc');
        $speaker->website = $request->input('website');

        if($speaker->save()){
            return Response($speaker, 200);
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
        $speakers = Speaker::find($id);
        return Response($speakers, 200);
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
            'type' =>  'required',
        ]);

        $speaker = Speaker::find($id);

        $speaker->name = $request->input('name');
        $speaker->type = $request->input('type');
        $speaker->linkedin = $request->input('linkedin');
        $speaker->facebook = $request->input('facebook');
        $speaker->twitter = $request->input('twitter');
        $speaker->small_desc = $request->input('small_desc');
        $speaker->website = $request->input('website');

        if($speaker->save()){
            return Response($speaker, 200);
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
        $speaker = Speaker::findOrFail($id);
        if($speaker->delete()){
            return Response('Atração excluida com sucesso!', 200);
        }
        return Response('Não foi possível realizar a operação', 500); 
    }
}
