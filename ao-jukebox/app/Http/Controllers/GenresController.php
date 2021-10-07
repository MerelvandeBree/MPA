<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use App\Models\Songs;
use Illuminate\Http\Request;
use App\Models\User;

class GenresController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $genres = Genres::all();
        return view('genres.index', compact('genres', 'you'));
    }

    public function songList($genre_id)
    {
        $you = auth()->user();
        $songs = Songs::where('genre_id', '=', $genre_id)->get();
        return view('songs.index', compact('songs'));
    }

}
