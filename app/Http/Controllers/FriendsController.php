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

        // $friendReq = auth()->user()->friends;
        // return view('subpages/friends',compact('friendReq'));        
        $friend = Friends::where('friend_id', auth()->user()->id)->wherePivot('status','pending')->get();
        return dd($friend[0]->user);
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
        $existingFriendship = Friends::where('user_id', auth()->user()->id)
            ->where('friend_id', $user->id)
            ->first();
      
        if ($existingFriendship) {
            return back()->with('error', 'Friendship already exists');
        }

        //
        $friend = new Friends;
        $friend->user_id = auth()->user()->id;
        $friend->friend_id = $user->id;
        $friend->save();

        $friend = new Friends;
        $friend->friend_id = auth()->user()->id;
        $friend->user_id = $user->id;
        $friend->save();

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
    public function update(Request $request, Friends $friends)
    {
        //
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
