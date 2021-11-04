<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
    }
}
