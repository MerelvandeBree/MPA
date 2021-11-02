<?php

namespace App\Http\Controllers;

use App\Models\Saved_lists;
use App\Models\SessionSongs;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class Saved_songsController extends Controller
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

    public function index()
    {
        $sp = new SessionSongs();

        $savedSongs = $sp->getSongs();

        return view('savedSongs.index', compact('savedSongs'));
    }

    public function add($song_id)
    {
        $sp = new SessionSongs();
        $sp->AddSong($song_id);

        $savedSongs = $sp->getSongs($song_id);

        return view('savedSongs.add', compact('savedSongs'));
    }

    public function delete($song_id)
    {
        $sp = new SessionSongs();
        $sp->DeleteSong($song_id);

        return redirect()->route('savedSongs.index');
    }

}
