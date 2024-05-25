<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TampilanHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $home = Home::get();

        return view("admin.landingpage.home.index", compact("home"));
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
        $existingData = Home::first();

        if ($existingData) {
            return redirect()->route('home.index')->with('gagal', 'Data hanya dapat diinputkan sekali');
        }

        $this->validate($request, [
            'gambar' => 'required|mimes:jpg,jpeg,png',
            'teks1' => 'required',
            'teks2' => 'required',
        ]);

        $homePath = $request->file('gambar')->store('landingPage', 'public');

        $home = Home::create([
            'gambar' => $homePath,
            'teks1' => $request->teks1,
            'teks2' => $request->teks2
        ]);

        if ($home) {
            return redirect()->route('home.index')->with('berhasil', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('home.index')->with('gagal', 'Data gagal ditambahkan');
        }
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
        $this->validate($request, [
            'gambar' => 'mimes:jpg,jpeg,png',
            'teks1' => 'required',
            'teks2' => 'required',
        ]);

        $home = Home::findOrFail($id);

        $homePath = $home->gambar;

        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($homePath);
            $homePath = $request->file('gambar')->store('landingPage', 'public');
        }

        $home->update([
            'gambar' => $homePath,
            'teks1' => $request->teks1,
            'teks2' => $request->teks2
        ]);

        if ($home) {
            return redirect()->route('home.index')->with('berhasil', 'Data berhasil diperbarui');
        } else {
            return redirect()->route('home.index')->with('gagal', 'Data gagal diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $home = Home::findOrFail($id);

        $gambarPath = $home->gambar;

        Storage::disk('public')->delete($gambarPath);

        $home->delete();

        if ($home) {
            return redirect()->route('home.index')->with('berhasil', 'Data berhasil dihapus');
        } else {
            return redirect()->route('home.index')->with('gagal', 'Data gagal dihapus');
        }
    }
}
