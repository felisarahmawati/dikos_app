<?php

namespace App\Http\Controllers;

use App\Models\tipekamar;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TipeKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipekamar = tipekamar::get();
        
        return view("admin.kamar.tipekamar.index", compact("tipekamar"));
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
        $this->validate($request, [
            'gambar' => 'required|mimes:jpg,jpeg,png',
            'tipe_kamar' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
        ]);

        $tipekamarPath = $request->file('gambar')->store('tipekamar', 'public');

        $tipekamar = tipekamar::create([
            'gambar' => $tipekamarPath,
            'tipe_kamar' => $request->tipe_kamar,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($tipekamar) {
            return redirect()->route('tipekamar.index')->with('berhasil', 'Tipe Kamar baru telah ditambahkan');
        } else {
            return redirect()->route('tipekamar.index')->with('gagal', 'Tipe Kamar baru gagal ditambahkan');
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'gambar' => 'nullable|mimes:jpg,jpeg,png',
            'tipe_kamar' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
        ]);

        $tipekamar = tipekamar::findOrFail($id);

        $tipekamarPath = $tipekamar->gambar;

        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($tipekamarPath);
            $tipekamarPath = $request->file('gambar')->store('tipekamar', 'public');
        }

        $tipekamar->update([
            'gambar' => $tipekamarPath,
            'tipe_kamar' => $request->tipe_kamar,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($tipekamar) {
            return redirect()->route('tipekamar.index')->with('berhasil', 'Tipe Kamar berhasil diperbarui');
        } else {
            return redirect()->route('tipekamar.index')->with('gagal', 'Tipe Kamar gagal diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tipekamar = tipekamar::find($id);
        $tipekamar->delete();

        if ($tipekamar) {
            return redirect()->route('tipekamar.index')->with('berhasil', 'Tipe Kamar berhasil dihapus');
        } else {
            return redirect()->route('tipekamar.index')->with('gagal', 'Tipe Kamar gagal dihapus');
        }
    }
}
