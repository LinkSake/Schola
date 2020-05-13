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

Route::get('/', 'GeneralController@index');

Route::group(['prefix'=>'curso'], function() {
    Route::get('listado', 'CursoController@list');
    Route::get('nuevo', 'CursoController@new');
    Route::post('nuevo', 'CursoController@create');
    Route::get('editar/{id}', 'CursoController@edit');
    Route::post('editar', 'CursoController@update');
    Route::get('eliminar/{id}', 'CursoController@remove');
    Route::post('eliminar', 'CursoController@delete');
});

Route::group(['prefix'=>'maestro'], function() {
    Route::get('listado', 'MaestroController@list');
    Route::get('nuevo', 'MaestroController@new');
    Route::post('nuevo', 'MaestroController@create');
    Route::get('editar/{id}', 'MaestroController@edit');
    Route::post('editar', 'MaestroController@update');
    Route::get('eliminar/{id}', 'MaestroController@remove');
    Route::post('eliminar', 'MaestroController@delete');
});

Route::group(['prefix'=>'maestroCurso'], function() {
    Route::get('nuevo', 'MaestroCursoController@new');
    Route::post('nuevo', 'MaestroCursoController@create');
    Route::get('editar/{id}', 'MaestroCursoController@edit');
    Route::post('editar', 'MaestroCursoController@update');
    Route::get('eliminar/{id}', 'MaestroCursoController@remove');
    Route::post('eliminar', 'MaestroCursoController@delete');
});