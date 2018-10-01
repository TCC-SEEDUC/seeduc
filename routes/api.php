<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

#CUSTOM ROUTES TO HANDLE LOGIN  
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('recover', 'AuthController@recover');
Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('logout', 'AuthController@logout');
    Route::get('test', function(){
        return response()->json(['foo'=>'bar']);
    });
});



#Controllers Routes - Index, Create, Store, Show, Edit, Update & Destroy
/*Route::resource('activities', 'ActivityController');
Route::resource('certificates', 'Certificateontroller');
Route::resource('dashboards', 'DashboardController');
Route::resource('events', 'EventController');
Route::resource('feedbacks', 'FeedbackQuizController');
Route::resource('feeds', 'FeedController');
Route::resource('locations', 'LocationController');
Route::resource('quizzes', 'QuizController');
Route::resource('rooms', 'RoomController');
Route::resource('schedules', 'ScheduleController');
Route::resource('speakers', 'SpekaersController');
Route::resource('tickets', 'TicketController');*/




#Controller Routes - Differents Kinds of routes
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

/**
 * Every route must return a json response with the command
 * return response('Success Example', 404);
 * Response must have a message and a status
 * Or response must be with a json object like:
 * 
 * $post = new Post();
 * $post->likes++;
 * $post->save();
 * return response($post,200);
 * 
 */