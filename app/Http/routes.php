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

Route::get('/', 'PagesController@home');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/**
 * Statuses
 */

Route::get('statuses', 'StatusController@index');
Route::post('statuses', 'StatusController@store');

Route::post('statuses/{id}/comments', 'CommentsController@store');

/**
 * Users
 */

Route::get('users', 'UsersController@index');
Route::get('users/{id}', 'UsersController@show');

/**
 * Follows controller
 */

Route::post('follows', 'FollowersController@store');
Route::delete('follows/{id}', 'FollowersController@destroy');