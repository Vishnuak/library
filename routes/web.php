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

Route::post('/', 'BooksController@store');
Route::patch('/{id}', 'BooksController@update');
Route::delete('/{id}', 'BooksController@destroy')->name('delete');

Route::view('/export', 'export');
Route::post('/export', 'BooksController@export');

Route::get('/', 'BooksController@index');
Route::get('/{id}', 'BooksController@edit');
