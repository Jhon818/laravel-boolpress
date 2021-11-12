<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guest.home');
    }

    public function listPostsApi() {
        return view('api.index');
    }

    public function profile() {
        return view('admin.profile');
    }

    public function generateToken() {
       $api_token = Str::random(80);

       #assegniamo all'utente corrente l'api_token

       $user = Auth::user();
       $user->api_token = $api_token;
       $user->save();

       return redirect()->route('admin.profile');
    }
}
