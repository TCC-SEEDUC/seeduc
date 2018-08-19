<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpeakerController extends Controller
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
        $speaker = new Speaker;

        $speaker->name = $request->input('name');
        $speaker->type = $request->input('type');
        $speaker->linkedin = $request->input('linkedin');
        $speaker->facebook = $request->input('facebook');
        $speaker->twitter = $request->input('twitter');
        $speaker->small_desc = $request->input('small_desc');
        $speaker->website = $request->input('website');
              
        $speaker->save();
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
        $speaker = Speaker::find($id);

        $speaker->name = $request->input('name');
        $speaker->type = $request->input('type');
        $speaker->linkedin = $request->input('linkedin');
        $speaker->facebook = $request->input('facebook');
        $speaker->twitter = $request->input('twitter');
        $speaker->small_desc = $request->input('small_desc');
        $speaker->website = $request->input('website');

        $speaker->save();
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
