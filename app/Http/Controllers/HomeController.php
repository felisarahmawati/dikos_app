<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\About;
use App\Models\Kamar;
use App\Models\tipekamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $home = Home::get();
        $about = About::get();
        $tipekamar = tipekamar::get();
        $kamar = Kamar::get();

        if (Auth::check() && Auth::user()->checkrole == '0') {
            return redirect()->intended('admin');
        }

        $tipekamar = tipekamar::get();
        return view('pengguna.layouts_user.content', compact("home", "about", "tipekamar", "kamar"));
    }
}
