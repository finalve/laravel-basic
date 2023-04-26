<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FriendshipController extends Controller
{
     public function index()
    {
        $loggedInUserId = auth()->user()->id;

        $friendIds = auth()->user()->friends->pluck('id')->toArray();
        $friendRequestsReceived = auth()->user()->friendRequests->where('status', 'pending');
        $friendRequestsSent = auth()->user()->friendRequestsSent->where('status', 'pending');

        $users = User::whereNotIn('id', [$loggedInUserId])
                    ->whereNotIn('id', $friendIds)
                    ->select('id', 'name')
                    ->get();

        return view('friendship.index', compact('friendRequestsReceived', 'friendRequestsSent', 'users'));
    }

}
