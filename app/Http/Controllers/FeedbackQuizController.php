<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackQuizController extends Controller
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

        #Inserção Tabela de FeedBackQuiz
        
        $feedbackQuiz = new FeedbackQuiz;
        $feedbackQuiz->A1 = $request->input('A1');
        $feedbackQuiz->B1 = $request->input('B1');
        $feedbackQuiz->C1 = $request->input('C1');
        $feedbackQuiz->D1 = $request->input('D1');
        $feedbackQuiz->A2 = $request->input('A2');
        $feedbackQuiz->users_comment = $request->input('users_comment');
        $feedbackQuiz->A3 = $request->input('A3');
        $feedbackQuiz->B3 = $request->input('B3');
        $feedbackQuiz->justify_B3_answer = $request->input('justify_B3_answer');
        $feedbackQuiz->C3 = $request->input('C3');
        $feedbackQuiz->justify_C3_answer = $request->input('justify_C3_answer');
        $feedbackQuiz->users_praise = $request->input('users_praise');
        $feedbackQuiz->users_criticism = $request->input('users_criticism');
        $feedbackQuiz->users_suggestions = $request->input('users_suggestions');
        $feedbackQuiz->save();

        #Inserção Tabela de Resolução

        $userFeedback = new UsersFeedback;
        $userFeedback->user_id = $id;
        $userFeedback->feedback_id = $feedbackQuiz->id;
        $userFeedback->activity_id = $request->input('activity_id');
        $userFeedback->save();

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
