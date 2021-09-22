<?php

namespace App\Http\Controllers;

use App\Models\Saved_lists;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $savedLists = Saved_lists::all();
        return view('savedLists.index', compact('savedLists', 'you'));
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
