<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saved_lists extends Model
{
    use HasFactory;
    protected $table = 'saved_lists';

    public function Songs() {
        $savedSongs = PlaylistSong::where('playlist_id', '=', $this->id)->get();
        $songs = array();
        foreach ($savedSongs as $song) {
            array_push($songs, Songs::find($song->song_id));
        }
        return $songs;
    }

}
