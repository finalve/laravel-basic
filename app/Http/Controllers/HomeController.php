<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $loggedInUserId = Auth::id();
        $posts = Posts::latest()->get();
        // get list of friend IDs
        $friendIds = Friends::where('user_id', $loggedInUserId)
            ->pluck('friend_id')
            ->toArray();

        // get list of non-friend users
        $users = User::whereNotIn('id', [$loggedInUserId])
            ->whereNotIn('id', $friendIds)
            ->select('id', 'name')
            ->get();

        // get list of friend users
        $friendUsers = User::whereIn('id', $friendIds)
            ->select('id', 'name')
            ->get();
        return view('home', compact('posts', 'users', 'friendUsers'));
    }
}
