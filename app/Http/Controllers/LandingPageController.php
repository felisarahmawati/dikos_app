<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\About;
use App\Models\Kamar;
use App\Models\tipekamar;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $home = Home::get();
            $about = About::get();
            $tipekamar = tipekamar::get();
            $kamar = Kamar::get();

            return view('pengguna.layouts_user.content', compact("home", "about", "tipekamar"));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
