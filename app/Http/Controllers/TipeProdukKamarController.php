<?php

namespace App\Http\Controllers;

use App\Models\TipeProduk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TipeProdukKamarController extends Controller
{
    public function index()
    {
        $tipeproduk = TipeProduk::get();

        return view('admin.produkkamar.tipeprodukkamar.index', compact("tipeproduk"));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tipe_produk' => 'required',
            'harga' => 'required',
        ]);

        $tipeproduk = TipeProduk::create([
            'tipe_produk' => $request->tipe_produk,
            'harga' => $request->harga,
        ]);

        if ($tipeproduk) {
            return redirect()->route('tipeprodukkamar.index')->with('berhasil', 'Tipe Produk baru telah ditambahkan');
        } else {
            return redirect()->route('tipeprodukkamar.index')->with('gagal', 'Tipe Produk baru gagal ditambahkan');
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tipe_produk' => 'required',
            'harga' => 'required',
        ]);

        $tipeproduk = TipeProduk::findOrFail($id);

        $updateData = [
            'tipe_produk' => $request->tipe_produk,
            'harga' => $request->harga,
        ];

        $tipeproduk->update($updateData);

        if ($tipeproduk) {
            return redirect()->route('tipeprodukkamar.index')->with('berhasil', 'Tipe Produk berhasil diperbarui');
        } else {
            return redirect()->route('tipeprodukkamar.index')->with('gagal', 'Tipe Produk gagal diperbarui');
        }
    }

    public function destroy($id)
    {

        $tipeproduk = TipeProduk::find($id);
        $tipeproduk->delete();

        if ($tipeproduk) {
            return redirect()->route('tipeprodukkamar.index')->with('berhasil', 'Tipe Produk berhasil dihapus');
        } else {
            return redirect()->route('tipeprodukkamar.index')->with('gagal', 'Tipe Produk gagal dihapus');
        }
    }
}
