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

// Route::resource('cadastro', 'RankedController');
// Route::resource('contatos', 'ContatoController');


// Route::group(['middleware' => 'auth',], function () {
Route::group([], function () {
    Route::group([
	], function () {
		Route::get('/cadastro', ["uses" => 'RankedController@create', "as" => "create"]);
		Route::post('/store', ["uses" => 'RankedController@store', "as" => "store"]);
	});
});
