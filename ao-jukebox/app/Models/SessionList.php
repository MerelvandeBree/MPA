<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class SessionList extends Model
{
    use HasFactory;
    protected $table = 'saved_lists';
    private $items = Array();

    function __construct()
    {
        if (! Session::exists('playlist')) {
            Session::put('playlist', $this->items);
        } else {
            $this->items = Session::get('playlist');
        }
        $current_playlist = Session::get('playlist');
        parent::__construct();
    }

    function AddSong($song_id) {
        $this->items[] = $song_id;
        $this->SaveSession();
    }

    function SaveSession() {
        Session::put('playlist', $this->items);
    }

}
