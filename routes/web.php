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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/analisa/create', 'AnalysisController@create');
Route::post('/analisa', 'AnalysisController@store');
Route::get('/analisa/{data_fuzzy}', 'AnalysisController@show');
Route::post('/analisa/{data_fuzzy}/hasil', 'AnalysisController@analisa');
Route::get('/list', 'AnalysisController@list');

// Route::resource('analisa', 'AnalysisController');