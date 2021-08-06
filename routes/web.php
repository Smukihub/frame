<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas Web
|--------------------------------------------------------------------------
|
| Aquí es donde se registra las rutas web para la aplicación.
| RouteServiceProvider carga las rutas dentro de un grupo que
| contiene el grupo de middleware "web".
|
*/

Route::get('/','InicioControler@inicio');

Route::get('version',function()
{
    phpinfo();
});
//Route::get('/tablero','InicioControler@tablero');

Auth::routes();

Route::resource('Horarios','HorarioControler');

Route::resource('Proyectos','ProyectoControler');
//Route::resource('Historicos','HistoricoControler');
Route::resource('Usuarios','UserControler');
Route::get('lista-usuarios-pdf','UserControler@exportPdf')->name('users.pdf');
Route::get('usuario-pdf/{Usuario}','UserControler@exportOnePdf');

Route::get('seguimientos/{proyectos_id}','seguimientosController@index');
Route::get('Historicos/{historico}','seguimientosController@show');
Route::delete('Historicos/{historico}','seguimientosController@destroy');


Route::get('nuevo-seguimiento/{proyectos_id}','seguimientosController@nuevo');
//Route::get('ver-historico/{proyectos_id}','seguimientosController@');
Route::post('seguimientos/{proyectos_id}','seguimientosController@store');

Route::get('ver-horario/{proyectos_id}','VerControler@ver');

//Route::get('/home', 'HomeController@index')->name('home');


Route::get('version', function(){
    phpinfo();
});