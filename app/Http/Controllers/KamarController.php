<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Tipekamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data kamar dari model Kamar
        $kamar = Kamar::with('tipekamar')->get();
        $tipekamar = Tipekamar::get();

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
            "tipekamar_id" => 'required|exists:tipekamar,id',
            "gambar" => 'required|mimes:jpg,jpeg,png',
            "deskripsi" => 'required',
            "stok" => 'required|integer|min:1',
        ],
        [
            "tipekamar_id.required" => 'Tipe kamar harus diisi',
            "gambar.required" => 'Gambar harus diisi',
            "deskripsi.required" => 'Deskripsi harus diisi',
            "stok.required" => 'Stok kamar harus diisi',
            "stok.integer" => 'Stok kamar harus berupa angka',
            "stok.min" => 'Stok kamar minimal 1',
        ]);


        // Lanjutkan dengan menyimpan data jika validasi berhasil
        if ($request->hasFile('gambar')) {
            $gambarKamarPath = $request->file('gambar')->store('gambarKamar', 'public');
        } else {
            // Tangani situasi jika tidak ada file yang diunggah
            return back()->with(['gagal' => 'Tidak ada file yang diunggah!']);
        }

        // Tambahkan beberapa kamar berdasarkan stok
        $tipekamar_id = $request->tipekamar_id;
        $deskripsi = $request->deskripsi;
        $stok = $request->stok;

        for ($i = 0; $i < $stok; $i++) {
            // Generate nomor kamar
            $nomor_kamar = Kamar::generateNomorKamar($tipekamar_id);

            // Buat Kamar baru
            Kamar::create([
                "tipekamar_id" => $tipekamar_id,
                "nomor_kamar" => $nomor_kamar,
                "gambar" => $gambarKamarPath,
                "deskripsi" => $deskripsi,
                "stok" => 1, // Set stok 1 untuk setiap kamar individu
            ]);
        }

        return redirect()->route('kamar.index')->with('berhasil', 'Kamar baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tipeKamar = Tipekamar::with('kamars')->findOrFail($id);
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
            'nomor_kamar' => [
                'required',
                Rule::unique('kamars')->ignore($id)->where('tipekamar_id', $request->tipekamar_id),
            ],
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
