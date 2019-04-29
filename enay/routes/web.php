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
//Route::get('/mother', 'HomeController@maternal');
/*
Route::get('/child', 'HomeController@child');
Route::get('/analytics', 'HomeController@analytics');
Route::get('/graph', 'HomeController@graph');
Route::get('/map', 'HomeController@map');
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::resource('layouts.child', 'ChildController');

Route::resource('/mother', 'MotherController');
Route::get('/MaternalCare', 'MotherController@showMaternalCard');
Route::get('/mother', 'MotherController@searchMother');

