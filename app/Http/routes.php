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

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes...
Route::group(['as' => 'login', 'middleware' => 'guest'], function() {
  Route::get('login',  'Auth\AuthController@getLogin');
  Route::post('login', 'Auth\AuthController@postLogin');
});

Route::get('logout', ['as' => 'logout', 'middleware' => 'auth', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('signup', 'Auth\AuthController@getSignup');
Route::post('signup', 'Auth\AuthController@postSignup');

Route::get('home',    function(){
    return view('welcome');
});

Route::get('dashboard', array('before' => 'auth', 'uses' => 'UserController@dashboard'));
