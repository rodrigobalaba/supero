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

Route::get('imagem/resize', 'TestResizeController@index');

Route::post('imagem/resize', 'TestResizeController@salvar');

Route::get('imagem/download/{id}', 'TestResizeController@download');