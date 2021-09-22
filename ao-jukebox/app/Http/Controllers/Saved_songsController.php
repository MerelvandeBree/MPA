<?php

namespace App\Http\Controllers;

use App\Models\Saved_songs;
use Illuminate\Http\Request;
use App\Models\User;

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $savedSongs = Saved_songs::all();
        return view('savedSongs.index', compact('savedSongs', 'you'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        $user = User::find($id);
//        return view('dashboard.admin.userShow', compact( 'user' ));
//    }

}
