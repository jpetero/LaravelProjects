<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Bring in the user model
use App\User;

class HomeController extends Controller

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // The user_id comes from the authentication
        $user_id = auth()->user()->id;

        // Query that specific user from the database
        $user = User::find($user_id);

        // Return the view with the user and all his posts
        return view('home')->with('posts', $user->posts);
    }
}
