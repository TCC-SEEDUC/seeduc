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
        $infos = Internal_info::all();
        return Response($infos, 200);
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
            'cpf' =>  'required',
            'register_id' =>  'required',
        ]);

        $info = new Internal_info;

        $info->name = $request->input('name');
        $info->cpf = $request->input('cpf');
        $info->register_id = $request->input('register_id');

        if($info->save()){
            return Response($info, 200);
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
       $info = Internal_info::find($id);
       return Response($info, 200);
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
            return Response($info, 200);
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
        $info = Internal_info::findOrFail($id);
        if($info->delete()){
            return Response('Interno excluido com sucesso!', 200);
        }
        return Response('Não foi possível realizar a operação', 500); 
    }
}
