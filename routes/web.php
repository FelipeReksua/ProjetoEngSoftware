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

Route::group(['middleware' => 'auth',], function () {
   	Route::get('/ranking/cadastro', 'RankedController@cadastro');
	Route::get('/ranking/contemplados', 'ContempladoController@index');

   	Route::get('/users/cadastro', 'UserController@cadastro');
	Route::get('/users', 'UserController@index')->name('index');

	Route::resource('ranking', 'RankedController');
	Route::resource('contemplado', 'ContempladoController');
	Route::resource('users', 'UserController');

	Route::post('contemplados/contemplar', ['as' => 'contemplar', 'uses' => 'ContempladoController@contemplar']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
