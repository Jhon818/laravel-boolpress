<?php

namespace App\Http\Controllers;

use App\boolpress;
use Illuminate\Http\Request;

class BoolpressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $postsBoollpress = boolpress::all();
    return view('guest.posts.index' , compact('posts'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\boolpress  $boolpress
     * @return \Illuminate\Http\Response
     */
    public function show(boolpress $boolpress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\boolpress  $boolpress
     * @return \Illuminate\Http\Response
     */
    public function edit(boolpress $boolpress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\boolpress  $boolpress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, boolpress $boolpress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\boolpress  $boolpress
     * @return \Illuminate\Http\Response
     */
    public function destroy(boolpress $boolpress)
    {
        //
    }
}
