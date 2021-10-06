<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class SessionSongs extends Model
{
    use HasFactory;
    protected $table = 'saved_songs';
    private $items = Array();

    function __construct()
    {
        if (! Session::exists('savedSongs')) {
            Session::put('savedSongs', $this->items);
        } else {
            $this->items = Session::get('savedSongs');
        }
        $current_playlist = Session::get('savedSongs');
        parent::__construct();
    }

    function AddSong($song_id) {
        $this->items[] = $song_id;
        $this->SaveSession();
    }

    function SaveSession() {
        Session::put('savedSongs', $this->items);
    }

}
