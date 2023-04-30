<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $loggedInUserId = Auth::id();
        $posts = Posts::Where('user_id', $loggedInUserId)->latest()->get();

        return view('subpages.profile',compact('posts'));
    }

    public function upload(Request $request){
        $request->validate([
            'message' => 'nullable',
            'img' => 'image|mimes:jpeg,png,gif,svg|max:2048|dimensions:max_width=5000,max_height=5000',

        ]);

        $file= $request->file('img');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('public/Image'), $filename);
        $post->img = $filename;
    }
}
