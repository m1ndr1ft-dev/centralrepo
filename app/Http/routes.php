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

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function() {

    Route::resource('agents', 'AgentController');

    Route::resource('employees', 'EmployeeController');

});

Route::controllers([

  'auth' => 'Auth\AuthController',
  'password' => 'Auth\PasswordController'
]);
