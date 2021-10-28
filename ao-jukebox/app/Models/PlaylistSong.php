<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaylistSong extends Model
{
    protected $table = 'playlistsong';
    use HasFactory;

    public function Song() {
        $songs = Songs::where('id', '=', $this->song_id)->get()->first();
//        var_dump($songs);
//        exit();
        return $songs;
    }

    public function Playlist() {
        $playlist = Saved_lists::where('id', '=', $this->playlist_id)->get()->first();
//echo "<pre>";
//        var_dump($playlist);
//        exit();
//        echo "</pre>";
        return $playlist;
    }
}
