<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('location.index', ['locations' => Location::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('location.create');
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
            'postal_code' =>  'required',
            'adress_number' =>  'required',
            'full_adress' =>  'required',
            'district' =>  'required',
            'city' =>  'required',
            'state' =>  'required',
        ]);

        $location = new Location;

        $location->name = $request->input('name');
        $location->postal_code = $request->input('postal_code');
        $location->adress_number = $request->input('adress_number');
        $location->adress_complement = $request->input('adress_complement');
        $location->full_adress = $request->input('full_adress');
        $location->district = $request->input('district');
        $location->city = $request->input('city');
        $location->state = $request->input('state');
        $location->reference_point = $request->input('reference_point');
        $location->work_days = $request->input('work_days');
        $location->open_hours = $request->input('open_hours');
        $location->close_hour = $request->input('close_hour');
        $location->manager_name = $request->input('manager_name');
        $location->manager_phone_number = $request->input('manager_phone_number');
        $location->manager_email = $request->input('manager_email');

        if($location->save()){
            return redirect()->action('LocationController@index'); 
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
        return view('location.show', ['location' => Location::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('location.edit', ['location' => Location::find($id)]);
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
        $location = Location::find($id);

        $this->validate($request, [
            'name' =>  'required',
            'postal_code' =>  'required',
            'adress_number' =>  'required',
            'full_adress' =>  'required',
            'district' =>  'required',
            'city' =>  'required',
            'state' =>  'required',
        ]);

        $location->name = $request->input('name');
        $location->postal_code = $request->input('postal_code');
        $location->adress_number = $request->input('adress_number');
        $location->adress_complement = $request->input('adress_complement');
        $location->full_adress = $request->input('full_adress');
        $location->district = $request->input('district');
        $location->city = $request->input('city');
        $location->state = $request->input('state');
        $location->reference_point = $request->input('reference_point');
        $location->work_days = $request->input('work_days');
        $location->open_hours = $request->input('open_hours');
        $location->close_hour = $request->input('close_hour');
        $location->manager_name = $request->input('manager_name');
        $location->manager_phone_number = $request->input('manager_phone_number');
        $location->manager_email = $request->input('manager_email');

        if($location->save()){
            return redirect()->action('LocationController@index'); 
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
        $location = Location::findOrFail($id);
        $location->delete();
        return redirect()->action('LocationController@index');
    }
}
