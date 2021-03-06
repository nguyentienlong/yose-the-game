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

Route::get('/contact', function () {
    return view('contact/index');
});

Route::get('/astroport', 'AstroportController@index');
Route::post('/astroport', 'AstroportController@store');

Route::get('/minesweeper', [
    'uses' => 'MineSweeperController@index'
]);
Route::get('/minesweeper/load', [
    'uses' => 'MineSweeperController@load',
]);

Route::get('/primeFactors', 'PrimeFactorController@index');
Route::get('/primeFactors/ui', function () {
    return view('primeFactors.index');
});
Route::get('/primeFactors/ui', function () {
    return view('primeFactors/index');
});

Route::get('/fire/geek', 'GeekController@index');



