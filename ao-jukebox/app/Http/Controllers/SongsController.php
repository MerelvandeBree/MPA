<?php

namespace App\Http\Controllers;

use App\Models\Songs;
use Illuminate\Http\Request;
use App\Models\User;

class SongsController extends Controller
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
        $songs = Songs::all();

        return view('songs.index', compact('songs'));
    }

    public function detail($id)
    {
        $song = Songs::find($id);

        return view('songs.detail', compact('song'));
    }

}
