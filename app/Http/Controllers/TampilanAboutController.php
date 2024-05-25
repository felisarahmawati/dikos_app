<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TampilanAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::get();
        return view("admin.landingpage.about.index", compact("about"));
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
        {
            $existingData = About::first();

            if ($existingData) {
                return redirect()->route('about.index')->with('gagal', 'Data hanya dapat diinputkan sekali');
            }

            $this->validate($request, [
                'gambar' => 'required|mimes:jpg,jpeg,png',
                'teks1' => 'required',
                'teks2' => 'required',
            ]);

            $aboutPath = $request->file('gambar')->store('landingPage', 'public');

            $about = About::create([
                'gambar' => $aboutPath,
                'teks1' => $request->teks1,
                'teks2' => $request->teks2
            ]);

            if ($about) {
                return redirect()->route('about.index')->with('berhasil', 'Data berhasil ditambahkan');
            } else {
                return redirect()->route('about.index')->with('gagal', 'Data gagal ditambahkan');
            }
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
        {
            $this->validate($request, [
                'gambar' => 'mimes:jpg,jpeg,png',
                'teks1' => 'required',
                'teks2' => 'required',
            ]);

            $about = About::findOrFail($id);

            $aboutPath = $about->gambar;

            if ($request->hasFile('gambar')) {
                Storage::disk('public')->delete($aboutPath);
                $aboutPath = $request->file('gambar')->store('landingPage', 'public');
            }

            $about->update([
                'gambar' => $aboutPath,
                'teks1' => $request->teks1,
                'teks2' => $request->teks2
            ]);

            if ($about) {
                return redirect()->route('about.index')->with('berhasil', 'Data berhasil diperbarui');
            } else {
                return redirect()->route('about.index')->with('gagal', 'Data gagal diperbarui');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $about = About::findOrFail($id);

        $gambarPath = $about->gambar;

        Storage::disk('public')->delete($gambarPath);

        $about->delete();

        if ($about) {
            return redirect()->route('about.index')->with('berhasil', 'Data berhasil dihapus');
        } else {
            return redirect()->route('about.index')->with('gagal', 'Data gagal dihapus');
        }
    }
}
