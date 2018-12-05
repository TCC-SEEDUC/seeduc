<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\User;
use App\Models\Subscription;
use App\Models\Activity;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Total de eventos
        $events = Event::all()->count();
        // Total de atividades
        $activities = Activity::all()->count();
        // Total de usuários
        $users = User::all()->count();
        // Total de inscrições
        $subscriptions = Subscription::all()->count();
        // Total de checkins
        $checkIns = Subscription::where('check_in', 1)->count();
 
        $response = [
            'eventsTotal' => $events,
            'activitiesTotal' => $activities,
            'usersTotal' => $users,
            'subscriptionsTotal' => $subscriptions,
            'checkInsTotal' => $checkIns
        ];

        return Response($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activities = [Activity::with('schedule')->where('event_id', $id)->get(), 
            Event::where('id', $id)->get()];
        return Response($activities, 200);
    }
}
