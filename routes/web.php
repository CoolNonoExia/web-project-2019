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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('log');



Route::get('/', 'AccueilController@index')->name('home');

Route::get('boutique', 'BoutiqueController@index')->name('boutique');
Route::get('boutiqueP','BoutiqueController@indexP')->name('boutiqueP');

Route::get('event', 'EventsController@index')->name('eve');

Route::get('eventN', 'EventsController@indexN')->name('even');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
