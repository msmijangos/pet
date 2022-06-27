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

Route::get('home', 'HomeController@index')->name('home');

// Apartado para mascota
Route::get('mascota', 'mascotaController@index')->name('mascota.index');
Route::get('mascota/crear', 'mascotaController@create')->name('mascota.create');
Route::post('mascota', 'mascotaController@store')->name('mascota.store');
Route::get('mascota/editar/{id}', 'mascotaController@edit')->name('mascota.edit');
Route::any('mascota/editar({id}', 'mascotaController@update')->name('mascota.update');
Route::any('mascota/elimiar/{id}', 'mascotaController@destroy')->name('mascota.destroy');

//apartado para vacunas
Route::get('vacuna', 'vacunasController@index')->name('vacuna.index');
Route::get('vacuna/crear', 'vacunasController@create')->name('vacuna.create');
Route::post('vacuna', 'vacunasController@store')->name('vacuna.store');
Route::get('vacuna/editar/{id}', 'vacunasController@edit')->name('vacuna.edit');
Route::any('vacuna/editar({id}', 'vacunasController@update')->name('vacuna.update');
Route::any('vacuna/elimiar/{id}', 'vacunasController@destroy')->name('vacuna.destroy');


//apartado para las consultas
Route::get('consulta', 'consultasController@index')->name('consulta.index');
Route::get('consulta/crear', 'consultasController@create')->name('consulta.create');
Route::post('consulta', 'consultasController@store')->name('consulta.store');
Route::get('consulta/editar/{id}', 'consultasController@edit')->name('consulta.edit');
Route::any('consulta/editar({id}', 'consultasController@update')->name('consulta.update');
Route::any('consulta/elimiar/{id}', 'consultasController@destroy')->name('consulta.destroy');
