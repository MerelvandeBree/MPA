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
        $you = auth()->user();
        $songs = Songs::all();
        return view('songs.index', compact('songs', 'you'));
    }

    public function detail($id)
    {
        $you = auth()->user();
//        $songs = Songs::all();
        $song = Songs::find($id);
        return view('songs.detail', compact('song', 'you'));
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
