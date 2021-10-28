<?php

namespace App\Http\Controllers;

use App\Models\PlaylistSong;
use App\Models\Saved_lists;
use App\Models\SessionSongs;
use App\Models\Songs;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Saved_listController extends Controller
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
        // get playlists
        $sp = new SessionSongs();
        $playlists = Saved_lists::all();
        return view('savedLists.index', compact('playlists'));

    }

    public function detail($id)
    {
        $playlistsong = PlaylistSong::where('playlist_id', $id)->get();
//        echo '<pre>';
//            var_dump($playlistsong->Songs());
//            exit();
//        echo '</pre>';
        return view('savedLists.detail', compact('playlistsong'));
    }

     public function add()
     {
        // Create playlist (invoegen naam + id)
        return view('savedLists.add');
     }

    public function store(Request $request)
    {
        // Add songs to playlist (koppelen van song_id + playlist_id door koppeltabel)

        $playlist = New Saved_lists();
        $playlist->saved_list = $request->playlist_name;

        $playlist->save();

        $sp = new SessionSongs();
        $savedSongs = $sp->getSongs();
        foreach($savedSongs as $ss)
        {
            $savedSong = new PlaylistSong();
            $savedSong->playlist_id = $playlist->id;
            $savedSong->song_id = $ss->id;
            $savedSong->save();
        }

        $playlists = Saved_lists::all();

        return view('Savedlists.index', compact('playlists'));

    }

    public function delete($id)
    {
        // Delete song from database
        $playlist = DB::table('playlistsong')->where('id', '=', $id)->delete();
        return view('Savedlists.delete', compact('playlist'));
    }

    public function edit($id)
    {
        // edit name playlist
        $playlist = DB::table('saved_lists')->find($id);
        return view('Savedlists.edit', compact('playlist'));
    }

    public function update(Request $request)
    {
        // Add songs to playlist (koppelen van song_id + playlist_id door koppeltabel)

        $playlist = Saved_lists::find($request->id);
        $playlist->saved_list = $request->name;
        $playlist->save();

        $playlists = Saved_lists::all();

        return view('Savedlists.index', compact('playlists'));

    }

}
