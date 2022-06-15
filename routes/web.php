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

/* Route::get('/', function () {
    return view('welcome');
})->name('welcome'); */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'AdController@index')->name('ad.index');
Route::get('/annonce', 'AdController@create')->name('ad.create');
Route::post('/annonce', 'AdController@store');
Route::post('/search', 'AdController@search')->name('ad.search');

Route:: get('annonce/{ad}/edit','AdController@edit')->name('ad.edit');
Route:: patch('annonce/{ad}', 'AdController@update')->name('ad.update');
Route:: delete('annonce/{ad}', 'AdController@destroy')->name('ad.destroy');
