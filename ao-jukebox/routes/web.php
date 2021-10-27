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
Route::get('/saved-lists', [\App\Http\Controllers\Saved_listController::class, 'index'])->name('savedLists.index');
Route::get('/saved-songs', [\App\Http\Controllers\Saved_songsController::class, 'index'])->name('savedSongs.index');

// Add pages
//Route::get('/saved-list/add/{song_id}', [\App\Http\Controllers\Saved_listController::class, 'add'])->name('savedLists.add');
Route::get('/saved-song/add/{song_id}', [\App\Http\Controllers\Saved_songsController::class, 'add'])->name('savedSongs.add');

// Detail pages
Route::get('/song/{song_id}', [\App\Http\Controllers\SongsController::class, 'detail'])->name('songs.detail');
Route::get('/genre/{genre_id}', [\App\Http\Controllers\GenresController::class, 'songList'])->name('genres.songList');
Route::get('/saved-list/{savedList_id}', [\App\Http\Controllers\Saved_listController::class, 'detail'])->name('savedList.detail');

// Delete pages
Route::get('/saved-song/delete/{song_id}', [\App\Http\Controllers\Saved_songsController::class, 'delete'])->name('savedSongs.delete');
Route::get('/saved-list/delete/{song_id}', [\App\Http\Controllers\Saved_listController::class, 'delete'])->name('savedList.delete');

// Create playlist
Route::get('/Savedlists/add', [\App\Http\Controllers\Saved_listController::class, 'add'])->name('savedlists.add');
Route::post('/Savedlists/store', [\App\Http\Controllers\Saved_listController::class, 'store'])->name('savedlists.store');


require __DIR__.'/auth.php';
