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

Route::get('register', 'AuthController@getRegistrationForm')->name('register');
Route::post('register', 'AuthController@postRegistrationForm')->name('register');

Route::get('login', 'AuthController@getLoginForm')->name('login');
Route::post('login', 'AuthController@postLoginForm')->name('login');

Route::get('logout', 'AuthController@logout')->name('logout');

Route::get('/', 'AccueilController@index')->name('home');

Route::get('boutique', 'BoutiqueController@index')->name('boutique');
Route::get('boutique/T{tri}','BoutiqueController@articles')->name('boutiqueT')->where('tri', '[0-9]+');
Route::get('boutique/{id}', 'BoutiqueController@article')->name('boutiqueSpe');
Route::get('boutiqueAdd', 'BoutiqueController@getProduct')->name('productAdd');
Route::post('boutiqueAdd', 'BoutiqueController@addProduct')->name('productAdd');
Route::post('boutique/s', 'BoutiqueController@addPanier')->name('boutiqueAddPanier');

Route::get('event', 'EventsController@index')->name('eve');
Route::get('eventN', 'EventsController@indexN')->name('even');
Route::get('eventP', 'EventsController@Past')->name('eveP');
Route::get('event/{id}', 'EventsController@Like')->name('eveL');
Route::get('eventAdd', 'EventsController@getAdd')->name('eveAdd');
Route::post('eventAdd', 'EventsController@postAdd')->name('eveAdd');
Route::post('event/{id}', 'EventsController@postComAdd')->name('ComAdd');
Route::post('eventR/{id}', 'EventsController@postRegister')->name('Regist');
Route::post('eventL/{id}', 'EventsController@postVote')->name('voteAdd');

Route::get('panier', 'PanierController@index')->name('panier');
Route::post('panier/remove', 'PanierController@remove')->name('panierRemove');
Route::post('panier/quantity', 'PanierController@changeQuantity')->name('panierChangeQuantity');

Route::get('idea', 'IdeaController@index')->name('idea');
Route::get('ideaAdd','IdeaController@getAdd')->name('ideaAdd');
Route::post('ideaAdd', 'IdeaController@postAdd')->name('ideaAdd');
Route::post('ideaL/{id}', 'IdeaController@postLike')->name('likeAdd');
Route::post('idealD/{id}', 'IdeaController@postDislike')->name('dislikeAdd');

Route::get('legal', 'LegalController@index')->name('legal');
