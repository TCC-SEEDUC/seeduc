<?php

use Illuminate\Http\Request;

Route::get('qr-code', 'QrController@make');

Route::resource('activities', 'ActivityController');
Route::resource('certificates', 'CertificateController');
Route::resource('dashboards', 'DashboardController');
Route::resource('events', 'EventController');
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

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('recover', 'AuthController@recover');
Route::group(['middleware' => ['jwt.auth']], function() {
	Route::get('logout', 'AuthController@logout');
	Route::get('test', function(){
		return response()->json(['foo'=>'bar']);
	});
});


