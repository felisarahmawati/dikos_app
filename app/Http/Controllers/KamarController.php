<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\tipekamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data kamar dari model Kamar
        $kamar = Kamar::with('tipekamar')->get();
        $tipekamar = tipekamar::get();

        return view("admin.kamar.index", compact('kamar','tipekamar'));
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
        // Lakukan validasi input
        $this->validate($request, [
            "tipekamar_id" => 'required',
            "nomor_kamar" => [
                'required',
                Rule::unique('kamars', 'nomor_kamar')->where('tipekamar_id', $request->tipekamar_id),
            ],
            "gambar" => 'required|mimes:jpg,jpeg,png',
            "deskripsi" => 'required',
        ],
        [
            "tipekamar_id.required" => 'Tipe kamar harus diisi',
            "nomor_kamar.required" => 'Nomor kamar harus diisi',
            "nomor_kamar.unique" => 'Nomor kamar sudah digunakan untuk tipe kamar tersebut!',
            "gambar.required" => 'Gambar harus diisi',
            "deskripsi.required" => 'Deskripsi harus diisi',
        ]);

        // Lanjutkan dengan menyimpan data jika validasi berhasil
        if ($request->hasFile('gambar')) {
            $gambarKamarPath = $request->file('gambar')->store('gambarKamar', 'public');
        } else {
            // Tangani situasi jika tidak ada file yang diunggah
            return back()->with(['gagal' => 'Tidak ada file yang diunggah!']);
        }

        $kamar = Kamar::create([
            "tipekamar_id" => $request->tipekamar_id,
            "nomor_kamar" => $request->nomor_kamar,
            "gambar" => $gambarKamarPath,
            "deskripsi" => $request->deskripsi,
        ]);

        // Tambahkan pesan berhasil atau gagal
        if ($kamar) {
            return redirect()->route('kamar.index')->with('berhasil', 'Kamar baru telah ditambahkan');
        } else {
            return redirect()->route('kamar.index')->with('gagal', 'Kamar baru gagal ditambahkan');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tipeKamar = tipekamar::with('kamars')->findOrFail($id);
        return view('pengguna.layouts_user.detail', compact('tipeKamar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tipekamar_id' => 'required',
            'nomor_kamar' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $kamar = Kamar::find($id);
        $kamar->tipekamar_id = $request->tipekamar_id;
        $kamar->nomor_kamar = $request->nomor_kamar;
        $kamar->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('uploads', 'public');
            $kamar->gambar = $imagePath;
        }

        $kamar->save();

        if ($kamar) {
            return redirect()->route('kamar.index')->with('berhasil', 'Kamar berhasil diperbarui');
        } else {
            return redirect()->route('kamar.index')->with('gagal', 'Kamar gagal diperbarui');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kamar = Kamar::findOrFail($id);

        $gambarPath = $kamar->gambar;

        Storage::disk('public')->delete($gambarPath);

        $kamar->delete();

        if ($kamar) {
            return redirect()->route('kamar.index')->with('berhasil', 'Data Kamar berhasil dihapus');
        } else {
            return redirect()->route('kamar.index')->with('gagal', 'Data Kamar gagal dihapus');
        }
    }
}
