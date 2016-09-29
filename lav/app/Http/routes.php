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


/*
 * Authorization section
 * */

// The login page
Route::get('/login','AuthController@showLogin')->name('login');
Route::post('/login','AuthController@validLogin')->name('login_validation');
Route::any('/logout','AuthController@logout')->name('logout');
// Forgot password page
Route::get('/forgot_password','AuthController@showForgotPassword')->name('forgot_password');
Route::post('/forgot_password','AuthController@actionForgotPassword')->name('forgot_password_action');

