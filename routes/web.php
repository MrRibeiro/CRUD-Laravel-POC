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

Route::get('/','ColaboradorController@index');
Route::post('/','ColaboradorController@store');
Route::any('/error', function () {
    return view('template/template-errors');
});
Route::get('/del/{id}','ColaboradorController@delete');
Route::get('/edit/{id}','ColaboradorController@edit');
Route::post('/update','ColaboradorController@update');