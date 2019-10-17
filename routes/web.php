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



//Route::get('/usuario', 'UsuarioController@index');
//Route::post('/usuario', 'UsuarioController@store');


Route::resource('usuario', 'UsuarioController');
Route::resource('compras', 'ComprasController');
Route::resource('producto', 'ProductoController');
Route::resource('calificacion', 'CalificacionController');