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


Route::resource('/categorias', 'CategoriasController');
Route::get('/categorias/delete/{id}', 'CategoriasController@borrar') ->name('categorias.destroy');

Route::resource('/alumnos', 'AlumnosController');
Route::get('/alumnos/delete/{id}', 'AlumnosController@borrar') ->name('alumnos.destroy');

Route::resource('/cursos', 'CursosController');
Route::get('/cursos/delete/{id}', 'CursosController@borrar') ->name('cursos.destroy');