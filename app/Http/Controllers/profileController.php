<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\ProfileUpload;
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
        $profile = new ProfileUpload;
        $profile->user_id = auth()->user()->id;
        $profile->message = $request->input('message');
        
        $file= $request->file('img');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> storeAs('Image', $filename);
        $profile->img = $filename;
        $profile->save();
    }
}
