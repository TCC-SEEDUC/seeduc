<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Internal_info;

class InternalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('internal.index', ['infos' => Internal_info::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('internal.create');
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
            'cpf' =>  'required',
            'register_id' =>  'required',
        ]);

        $info = new Internal_info;

        $info->name = $request->input('name');
        $info->cpf = $request->input('cpf');
        $info->register_id = $request->input('register_id');

        if($info->save()){
            return redirect()->action('InternalInfoController@index'); 
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
       return view('internal.show', ['info' => Internal_info::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('internal.edit', ['info' => Internal_info::find($id)]);
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
        $info = Internal_info::find($id);

        $this->validate($request, [
            'name' =>  'required',
            'cpf' =>  'required',
            'register_id' =>  'required',
        ]);

        $info->name = $request->input('name');
        $info->cpf = $request->input('cpf');
        $info->register_id = $request->input('register_id');

        if($info->save()){
            return redirect()->action('InternalInfoController@index'); 
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
        $info = Internal_info::findOrFail($id);
        if($info->delete()){
            return redirect()->action('InternalInfoController@index');
        }
    }
}
