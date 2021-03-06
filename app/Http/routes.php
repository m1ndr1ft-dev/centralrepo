<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();
Route::get('/home', 'HomeController@index');

/*
 * Redirects to home after successful log in.
 * Else, redirects to welcome page.
 */
Route::get('/', function () {

    if(Auth::check())
    {
        return Redirect::to('home');
    }
    return view('welcome');
});

/*
 * Gives access to controller(s) once the user is signed in.
 */
Route::group(['middleware' => 'auth'], function() {

    Route::model('employees', 'App\Employee');
    Route::model('agents', 'App\Agent');

    Route::bind('employees', function($value, $route) {
        return App\Employee::whereSlug($value)->first();
    });

    Route::bind('agents', function($value, $route) {
        return App\Agent::whereSlug($value)->first();
    });

    Route::bind('deletedAgents', function($value, $route) {
        return App\Agent::onlyTrashed()->whereSlug($value)->first();
    });


    Route::get('agents/trashed', 'AgentController@trashed');
    Route::get('/agents/restoreall', 'AgentController@restoreAll');

    Route::delete('agents/{agents}/{employees}', 'EmployeeController@delete');
    Route::delete('agents/{deletedAgents}/delete', 'AgentController@delete');
    Route::delete('agents/{deletedAgents}/restore', 'AgentController@restore');
    Route::delete('/agents/{agents}/hide', 'AgentController@hide');

    Route::post('/agents/{agents}/employees/{employees}/edit', 'EmployeeController@edit');
    Route::post('/agents/{agents}/edit', 'AgentController@edit');

    Route::resource('agents.employees', 'EmployeeController');
    Route::resource('agents', 'AgentController');

});

Route::controllers([
  'auth' => 'Auth\AuthController',
  'password' => 'Auth\PasswordController'
]);
