<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
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
        $id =  $request->session()->get('id');
        
        $quiz = new Quiz;

        $quiz->bond_id = $request->input('bond_id');
        $quiz->need_libras_interpreter = $request->input('need_libras_interpreter');
        $quiz->know_technology = $request->input('know_technology');
        $quiz->used_to_sites = $request->input('used_to_sites');
        $quiz->adept_qr_code = $request->input('adept_qr_code');
        $quiz->smartphone = $request->input('smartphone');
        $quiz->kind_professor = $request->input('teacher');
        if($request->input('city') == 'Outro'){
            $quiz->city_professor_work_at = print_r($request->input('outro'));
        }else{
            $quiz->city_professor_work_at = $request->input('city_professor_work_at');
        }
        if(!is_null($request->input('teacher'))){
            $quiz->professor = 1; 
        }else{
            $quiz->professor = 0; 
        }

        $quiz->user_id = $id;

        $quiz->save();

        return redirect()->action('FeedController@index');
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
        //
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
