<?php

namespace App\Http\Controllers;

use App\Models\Saved_lists;
use App\Models\SessionList;
use Illuminate\Http\Request;
use App\Models\User;

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

        $sp = new SessionList();
        echo '<pre>';
        var_dump($sp);
        echo '</pre>';

//        $you = auth()->user();
//        $savedLists = Saved_lists::all();
//        return view('savedLists.index', compact('savedLists', 'you'));
    }

    public function add($song_id) {
        $sp = new SessionList();
        $sp->AddSong($song_id);
        echo '<pre>';
        var_dump($sp);
        echo '</pre>';
    }

}
