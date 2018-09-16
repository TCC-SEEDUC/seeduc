<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Subscription;
use App\Services\Verificate;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
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
        $this->validate($request, [
            'user_id' =>  'required|numeric',
            'activity_id' =>  'required|numeric',
        ]);

        $verificate = new Verificate;
        #Verificações antes da inscrição do usuário | (Está incrito? Palestra cheia? Evento mesmo horário?)
        $is_signed = $verificate->is_signed($request->input('user_id'), $request->input('activity_id'));
        $is_full = $verificate->is_full($request->input('activity_id'));
        $event_time = $verificate->event_time($request->input('user_id'), $request->input('activity_id'));

        if ($is_signed != true && $is_full != true && $event_time != true) {
            $subscription = new Subscription;
                $subscription->user_id = $request->input('user_id');
                $subscription->activity_id = $request->input('activity_id');
            if ($subscription->save()) 
                return redirect()->action('FeedController@index');
        }
        print_r("Já Cadastrado ou Cheio ou Evento no mesmo horário ");   
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
        $subscription = Subscription::find($id);
        $subscription->user_id = $request->input('user_id');
        $subscription->activity_id = $request->input('activity_id');
        $subscription->certificate = $request->input('certificate');

        $subscription->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subscription::destroy($id);
        return redirect()->action('FeedController@index');
    }
}
