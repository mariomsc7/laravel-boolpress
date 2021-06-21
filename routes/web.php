<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // per non avere errore di editor su Auth
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

// Auth::routes(['register' => false]); se si vuole togliere la rotta di registrazione

// ROTTE ADMIN PANEL
// Route::get('/admin', 'HomeController@index')->name('home');

Route::prefix('admin') 
    ->namespace('Admin') // cartella in cui cercare i controller associati alle rotte
    ->middleware('auth') // autentificazione delle rotte
    ->name('admin.') // modifica del Name nella route:list - es: da home a admin.home
    ->group(function() 
    {
        // ROTTA HOME ADMIN PANEL
        Route::get('/', 'HomeController@index')->name('home');

        // ROTTE RESOURCE POSTS
        Route::resource('/posts', 'PostController');
    });


// FRONT OFFICE - deve stare sotto - gestito da Vue 
Route::get('{any?}', function () 
{
    return view('guest.home');
})->where('any', '.*');    