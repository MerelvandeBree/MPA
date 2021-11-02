<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class SessionSongs
{
    use HasFactory;
    private $items = Array();

    function __construct()
    {
        if (! Session::exists('savedSongs')) {
            Session::put('savedSongs', $this->items);
        } else {
            $this->items = Session::get('savedSongs');
        }
        $current_playlist = Session::get('savedSongs');
//        parent::__construct();
    }

    function AddSong($song_id) {
        $this->items[] = $song_id;
        $this->SaveSession();
    }

    function DeleteSong($song_id) {
        foreach ($this->items as $key => $value){
            if ($value == $song_id){
                unset($this->items[$key]);
            }
        }
        $this->SaveSession();
    }

    function SaveSession() {
        Session::put('savedSongs', $this->items);
    }

    function getSongs() {
        $songs = array();

        foreach ($this->items as $song) {
            array_push($songs, Songs::find($song));
        }

        return $songs;
    }

}
