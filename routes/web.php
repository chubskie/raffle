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

Route::get('login', 'IndexController@login')->name('login');
Route::post('login', 'LoginController@login');

Route::get('', 'GuestsController@create')->name('register');
Route::post('register', 'GuestsController@store');

Route::post('logout', 'LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {
	Route::any('logs', 'GuestsController@index')->name('dashboard');

	Route::post('guests/clear', 'GuestsController@destroyall');
	Route::post('guests/{id}', 'GuestsController@show');
	Route::post('guests/{id}/raffle', 'GuestsController@edit');
	Route::post('guests/{id}/edit', 'GuestsController@update');
	Route::post('guests/{id}/delete', 'GuestsController@destroy');

	Route::post('import', 'ReportController@import')->name('import');
	Route::any('export', 'ReportController@export')->name('export');
	Route::get('raffle', 'IndexController@raffle');

});
