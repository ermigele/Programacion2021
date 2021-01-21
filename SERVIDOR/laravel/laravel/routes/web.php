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


Route::get('/pruebas', function () {
    return 'hola mundo';
});


Route::get('/pruebasP/{id}', function ($id) {

    return 'El parametro es: ' . $id;
});

Route::get('/pruebasP/{id}/{nombre}', function ($id, $nombre) {

    return 'El parametro es: ' . $id . " y el nombre es: " . $nombre;
});

Route::get('/quienessomos', 'MiPrimerController@inicio');

Route::get('/dondeestamos/{nombre}', 'MiPrimerController@final');

Route::get('/contenido', 'MiPrimerController@contenido');

///AQUI

Route::get('/empleados', 'MiPrimerController@mostrarEmpleados');
Route::get('/centros', 'MiPrimerController@mostrarCentros');