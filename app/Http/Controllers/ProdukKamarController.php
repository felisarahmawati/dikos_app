<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\TipeProduk;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProdukKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data kamar dari model Kamar
        $produk = Produk::with('tipeproduk')->get();
        $tipeproduk = TipeProduk::get();

        return view("admin.produkkamar.index", compact('produk','tipeproduk'));
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
            "tipeproduk_id" => 'required',
            "gambar" => 'required|mimes:jpg,jpeg,png',
            "deskripsi" => 'required',
            "stok" => 'required|integer|min:1',
        ],
        [
            "tipeproduk_id.required" => 'Tipe Produk harus diisi',
            "gambar.required" => 'Gambar harus diisi',
            "deskripsi.required" => 'Deskripsi harus diisi',
            "stok.integer" => 'Stok Produk harus berupa angka',
        ]);

        // Lanjutkan dengan menyimpan data jika validasi berhasil
        if ($request->hasFile('gambar')) {
            $gambarProdukPath = $request->file('gambar')->store('gambarProduk', 'public');
        } else {
            // Tangani situasi jika tidak ada file yang diunggah
            return back()->with(['gagal' => 'Tidak ada file yang diunggah!']);
        }

        $produk = Produk::create([
            "tipeproduk_id" => $request->tipeproduk_id,
            "gambar" => $gambarProdukPath,
            "deskripsi" => $request->deskripsi,
            "stok" => $request->stok,
        ]);

        // Tambahkan pesan berhasil atau gagal
        if ($produk) {
            return redirect()->route('produkkamar.index')->with('berhasil', 'Produk baru telah ditambahkan');
        } else {
            return redirect()->route('produkkamar.index')->with('gagal', 'Produk baru gagal ditambahkan');
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
            'tipeproduk_id' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $produk = Produk::find($id);
        $produk->tipeproduk_id = $request->tipeproduk_id;
        $produk->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('uploads', 'public');
            $produk->gambar = $imagePath;
        }

        $produk->save();

        if ($produk) {
            return redirect()->route('produkkamar.index')->with('berhasil', 'produk berhasil diperbarui');
        } else {
            return redirect()->route('produkkamar.index')->with('gagal', 'produk gagal diperbarui');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        $gambarPath = $produk->gambar;

        Storage::disk('public')->delete($gambarPath);

        $produk->delete();

        if ($produk) {
            return redirect()->route('produkkamar.index')->with('berhasil', 'Data produk berhasil dihapus');
        } else {
            return redirect()->route('produkkamar.index')->with('gagal', 'Data produk gagal dihapus');
        }
    }
}
