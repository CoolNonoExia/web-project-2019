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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function()
{
    return View::make('pages.home');
})->name('home');




Route::get('about', function()
{
    return View::make('pages.about');
});
Route::get('projects', function()
{
    return View::make('pages.projetcts');
});
Route::get('contact', function()
{
    return View::make('pages.contact');
});

Route::get('boutique', function()
{
    return View::make('pages.boutique');
})->name('boutique');

Route::get('eve',function ()
{
    return View::make('pages.evenement');
})->name('eve');
