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
Route::get('/', function () {
    return view('home');
});

Route::get('/image/{image}', 'ImageController@show')->name('image.show');

/*Counties routes*/
Route::get('/counties/1', function () {

    return view("counties.1");
});

Route::get('/counties/2', function () {

    return view("counties.2");
});

Route::get('/counties/3', function () {

    return view("counties.3");
});

Route::get('/counties/4', function () {

    return view("counties.4");
});

Route::get('/counties/5', function () {

    return view("counties.5");
});

Route::get('/counties/6', function () {

    return view("counties.6");
});

Route::get('/counties/7', function () {

    return view("counties.7");
});

Route::get('/counties/8', function () {

    return view("counties.8");
});

Route::get('/counties/9', function () {

    return view("counties.9");
});

Route::get('/counties/10', function () {

    return view("counties.10");
});

Route::get('/counties/11', function () {

    return view("counties.11");
});

Route::get('/counties/12', function () {

    return view("counties.12");
});

Route::get('/counties/13', function () {

    return view("counties.13");
});

Route::get('/counties/14', function () {

    return view("counties.14");
});
