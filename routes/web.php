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
    return view('index');
});

Route::get('/share', function () {
    return view('share');
});


Route::get('/ping', function () {
    return ["alive" => true];
});

Route::get('/astroport', function () {
    return view('astroport/index');
});