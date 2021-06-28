<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/test', function() {
    return response()->json([
        'names' => ['Mario', 'Matteo', 'Marco', 'Alex'],
        'lorem' => 'ipsum'
    ]);
});


// GET BLOG POSTS
Route::namespace('Api')->group(function() {
    // GET POSTS
    Route::get('/posts', 'PostController@index');

    Route::get('posts/{slug}', 'PostController@show');
});

