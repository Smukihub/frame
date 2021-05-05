<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','InicioControler@inicio');
Route::get('tablero','InicioControler@tablero');
Auth::routes();

Route::resource('Horarios','HorarioControler');

Route::resource('Proyectos','ProyectoControler');
Route::resource('Historicos','HistoricoControler');
Route::resource('Usuarios','UserControler');

Route::get('ver_horario/{proyectos_id}','VerControler@ver');

//Route::get('/home', 'HomeController@index')->name('home');
