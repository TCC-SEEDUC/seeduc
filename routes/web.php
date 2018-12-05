<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
	return view('index');
});
#Controllers Routes - Index, Create, Store, Show, Edit, Update & Destroy
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

#Controller Routes - Differents Kinds of routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@postReset')->name('password.reset');
*/
Route::get('user/verify/{verification_code}', 'AuthController@verifyUser');