<?php

use Illuminate\Http\Request;

Route::get('qr-code', function () 
{
  return QRCode::text('QR Code Generator for Laravel!')->png();    
});


/*Route::middleware('jwt.auth')->get('users', function(Request $request) {
    return auth()->user();
});*/

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');

Route::resource('activities', 'ActivityController');
Route::post('recover', 'AuthController@recover');
Route::group(['middleware' => ['jwt.auth']], function() {
    Route::resource('events', 'EventController');
        Route::resource('activities', 'ActivityController');
        Route::resource('certificates', 'CertificateController');
        Route::resource('dashboards', 'DashboardController');
        Route::resource('feedbacks', 'FeedbackQuizController');
        Route::resource('feeds', 'FeedController');
        Route::resource('locations', 'LocationController');
        Route::resource('quizzes', 'QuizController');
        Route::resource('rooms', 'RoomController');
        Route::resource('schedules', 'ScheduleController');
        Route::resource('speakers', 'SpeakerController');
        Route::resource('tickets', 'TicketController');
        Route::resource('infos', 'InternalInfoController');
        Route::resource('subscriptions', 'SubscriptionController');
        Route::get('logout', 'AuthController@logout');
        Route::get('test', function(){
            return response()->json(['foo'=>'bar']);
        });
});


