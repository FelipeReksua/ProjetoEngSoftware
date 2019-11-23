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

Route::get('/ranking/cadastro', 'RankedController@cadastro');
Route::resource('ranking', 'RankedController');

Route::post('contemplados/contemplar', ['as' => 'contemplar', 'uses' => 'ContempladoController@contemplar']);

// Route::post('/contemplados/contemplar', 'ContempladoController@contemplar');
// Route::resource('contemplados', 'ContempladoController');

// Route::group(['middleware' => 'auth',], function () {
// Route::group([], function () {
//     Route::group([
// 	], function () {
// 		Route::get('/cadastro', ["uses" => 'RankedController@create', "as" => "create"]);
// 		Route::post('/store', ["uses" => 'RankedController@store', "as" => "store"]);
// 	});
// });
