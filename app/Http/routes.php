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

/*// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');*/
Route::any('home',    function(){
    return view('welcome');
});
Route::any('signup',    'UserController@signup');
Route::any('login',     'UserController@login');
Route::get('dashboard', array('before' => 'auth', 'uses' => 'UserController@dashboard'));
Route::get('logout',    function(){
    Auth::logout();
    Redirect::intended('/')->with('message', 'Сейчас вы будете перенаправлены на главную страницу');
});