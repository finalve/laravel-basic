<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
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
            'message' => 'required',
        ]);

        $post = new Posts;
        $post->user_id = auth()->user()->id;
        $post->message = $request->input('message');
        $post->save();
      
         return redirect()->route('home')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $post = Posts::find($id);
        $post->update(['message'=>'Update Message Successfuly!']);
        return redirect()->route('home')->with('success', 'Post UPDATE successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::find($id);
     
        if($post->user_id !== auth()->user()->id)
        return back();
        $post->delete();
      
        return redirect()->route('home')->with('success', 'Post Delete successfully!');
    }
}
