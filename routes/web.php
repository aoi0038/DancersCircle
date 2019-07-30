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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function() {
     Route::get('dancers/create', 'Admin\DancersController@add');
     Route::post('dancers/create', 'Admin\DancersController@create');
     Route::get('dancers', 'Admin\DancersController@index')->middleware('auth');
     Route::get('dancers/edit', 'Admin\DancersController@edit')->middleware('auth');
     Route::post('dancers/edit', 'Admin\DancersController@update')->middleware('auth');
     Route::get('dancers/delete', 'Admin\DancersController@delete')->middleware('auth');
});



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
