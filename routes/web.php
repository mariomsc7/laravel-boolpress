<?php

use Illuminate\Support\Facades\Route;

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
    return view('guest.welcome');
});

Auth::routes();

// ROTTE ADMIN PANEL
// Route::get('/admin', 'HomeController@index')->name('home');

Route::prefix('admin') 
    ->namespace('Admin') // cartella in cui cercare i controller associati alle rotte
    ->middleware('auth') // autentificazione delle rotte
    ->name('admin.') // modifica del Name nella route:list - es: da home a admin.home
    ->group(function() {
        // ROTTA HOME ADMIN PANEL
        Route::get('/', 'HomeController@index')->name('home');
        // ROTTE RESOURCE POSTS
    });
