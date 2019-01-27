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

// Authentification routes
//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('log');

Route::get('register', 'AuthController@getRegistrationForm')->name('register');
Route::post('register', 'AuthController@postRegistrationForm')->name('register');

Route::get('login', 'AuthController@getLoginForm')->name('login');
Route::post('login', 'AuthController@postLoginForm')->name('login');

Route::get('/', 'AccueilController@index')->name('home');

Route::get('boutique', 'BoutiqueController@index')->name('boutique');
Route::get('boutique/T{tri}','BoutiqueController@articles')->name('boutiqueT')->where('tri', '[0-9]+');
Route::get('boutique/{id}', 'BoutiqueController@article')->name('boutiqueSpe');

Route::get('event', 'EventsController@index')->name('eve');

Route::get('eventN', 'EventsController@indexN')->name('even');

Route::get('panier', 'PanierController@index')->name('panier');
Route::get('idea', 'IdeaController@index')->name('idea');

//TODO: delete later
Route::get('testing', 'AccueilController@testget');
