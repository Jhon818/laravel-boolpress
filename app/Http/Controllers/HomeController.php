<?php

namespace App\Http\Controllers;

use App\Mail\SendNewMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use illuminate\Support\Str;
use App\Lead;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        return view('guest.home');
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

    public function contact() {
        return view('guest.contacts');
    }

    public function handelContactForm(Request $request)
    {
        $form_data = $request->all();
        $new_lead = new Lead();
        $new_lead->fill($form_data);
        $new_lead->save();

        Mail::to('info@boolpress.com')->send(new SendNewMail($new_lead));

        return redirect()->route('contacts.thank-you');
    }

    public function thankYou() {
        return view('guest.thank-you');
    }
       
    


    public function listPostsApi() {
        return view('api.index');
    }


}
