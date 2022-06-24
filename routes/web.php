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

Route::get('vacunas', 'vacunasController@index')->name('vacunas.index');
Route::get('consultas', 'consultasController@index')->name('consultas.index');



