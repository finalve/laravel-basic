<?php

namespace App\Http\Controllers;

use App\Models\Branners;
use App\Models\Posts;
use App\Models\ProfileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrannersController extends Controller
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
        $profile = new Branners;
        $profile->user_id = auth()->user()->id;
        $profile->message = $request->input('message');
        
        $file= $request->file('img');
        $filename= auth()->user()->id."-".date('YmdHi').'.'.$file->getClientOriginalExtension();
        $file-> storeAs("public/image/branner/".auth()->user()->name, $filename);
        $profile->img = $filename;
        $profile->save();
        return back()->with('success', 'Upload Branner successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branners  $branners
     * @return \Illuminate\Http\Response
     */
    public function show(Branners $branners)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branners  $branners
     * @return \Illuminate\Http\Response
     */
    public function edit(Branners $branners)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branners  $branners
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branners $branners)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branners  $branners
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branners $branners)
    {
        //
    }
}
