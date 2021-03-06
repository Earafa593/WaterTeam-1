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


Route::get('/about', function(){
    return view('about');
});

Route::get('/counties', 'CountyController@index');

Route::get('/rivers', 'RiverController@index');

Route::get('/cities', 'CityController@index');

Route::get('/qualities', 'Water_qualityController@index');

Route::get('/', function () {
    return view('home');
});
