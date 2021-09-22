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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Route::get('/songs', [\App\Http\Controllers\SongsController::class, 'index']);
//Route::get('/genres', [\App\Http\Controllers\GenresController::class, 'index']);
//Route::get('/saved-lists', [\App\Http\Controllers\Saved_listController::class, 'index']);
//Route::get('/saved-list-songs', [\App\Http\Controllers\Saved_songsController::class, 'index']);

Route::resource('songs', \App\Http\Controllers\SongsController::class);
Route::resource('genres', \App\Http\Controllers\GenresController::class);
Route::resource('saved-lists', \App\Http\Controllers\Saved_listController::class);
Route::resource('saved-songs', \App\Http\Controllers\Saved_songsController::class);

require __DIR__.'/auth.php';
