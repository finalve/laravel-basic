<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use App\Models\User;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $friendReq = auth()->user()->friendsrequest()->get();

        // return view('subpages/friends',compact('friendReq'));        
        // $friendReq = Friends::where('friend_id', auth()->user()->id)->where('status','pending')->get();
        return view('subpages/friends', compact('friendReq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $user)
    {
        $friend = User::findOrFail($user->id);
        auth()->user()->addfriends()->attach([$friend->id]);

        return back()->with('success', 'Friend added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Friends  $friends
     * @return \Illuminate\Http\Response
     */
    public function show(Friends $friends)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Friends  $friends
     * @return \Illuminate\Http\Response
     */
    public function edit(Friends $friends)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Friends  $friends
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $friend = Friends::find($id);

        $friend->update(['status' => 'accepted',]);

        auth()->user()->addfriends()->attach([$friend->user_id,]);
        $find = Friends::where('user_id', $friend->friend_id)->where('friend_id', $friend->user_id)->firstOrFail();
        $find->update(['status' => 'accepted',]);
        return back()->with('success', 'Friend added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Friends  $friends
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friends $friends)
    {
        //
    }
}
