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

// Menu items
Route::resource('songs', \App\Http\Controllers\SongsController::class);
Route::resource('genres', \App\Http\Controllers\GenresController::class);
Route::resource('saved-lists', \App\Http\Controllers\Saved_listController::class);
Route::get('/saved-songs', [\App\Http\Controllers\Saved_songsController::class, 'index'])->name('savedSongs.index');


// Add pages
Route::get('/saved-list/add/{song_id}', [\App\Http\Controllers\Saved_listController::class, 'add'])->name('savedLists.add');
Route::get('/saved-song/add/{song_id}', [\App\Http\Controllers\Saved_songsController::class, 'add'])->name('savedSongs.add');

// Detail pages
Route::get('/song/{song_id}', [\App\Http\Controllers\SongsController::class, 'detail'])->name('songs.detail');
Route::get('/genre/{genre_id}', [\App\Http\Controllers\GenresController::class, 'songList'])->name('genres.songList');

// Delete pages
Route::get('/saved-song/delete/{song_id}', [\App\Http\Controllers\Saved_songsController::class, 'delete'])->name('savedSongs.delete');


require __DIR__.'/auth.php';
