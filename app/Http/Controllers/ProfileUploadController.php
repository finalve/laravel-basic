<?php

namespace App\Http\Controllers;

use App\Models\Branners;
use App\Models\Personal;
use App\Models\Posts;
use App\Models\ProfileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileUploadController extends Controller
{
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
        //
        $loggedInUserId = Auth::id();
        $name = auth()->user()->name;
        $posts = Posts::Where('user_id', $loggedInUserId)->latest()->get();
        $profile = ProfileUpload::Where('user_id',$loggedInUserId)->latest()->first();
        $branner = Branners::Where('user_id',$loggedInUserId)->latest()->first();
        $personal = Personal::Where('user_id',$loggedInUserId)->latest()->first();
        return view('subpages.profile',compact('posts','name','profile','branner','personal'));
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
    public function store(Request $request)
    {
        //
        $request->validate([
            'message' => 'nullable',
            'img' => 'required|image|mimes:jpeg,png,gif,svg|max:2048|dimensions:max_width=5000,max_height=5000',

        ]);
        $profile = new ProfileUpload;
        $profile->user_id = auth()->user()->id;
        $profile->message = $request->input('message');
        
        $file= $request->file('img');
        $filename= auth()->user()->id."-".date('YmdHi').'.'.$file->getClientOriginalExtension();
        $file-> storeAs("public/image/profile/".auth()->user()->name, $filename);
        $profile->img = $filename;
        $profile->save();
        return back()->with('success', 'Upload Profile successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfileUpload  $profileUpload
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileUpload $profileUpload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfileUpload  $profileUpload
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileUpload $profileUpload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfileUpload  $profileUpload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileUpload $profileUpload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfileUpload  $profileUpload
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileUpload $profileUpload)
    {
        //
    }
}
