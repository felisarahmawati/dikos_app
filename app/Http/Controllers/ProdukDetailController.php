<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Reservasi;
use App\Models\TipeProduk;
use Illuminate\Http\Request;
use App\Models\BuktiPembayaran;
use Illuminate\Support\Facades\Auth;

class ProdukDetailController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $produk = Produk::all();
        $tipeproduk = TipeProduk::all();

        // $reservasi = Reservasi::where('user_id', auth()->id())->get();
        $reservasi = Reservasi::where('user_id', $userId)->get();

        return view('pengguna.produk.produkdetail.index', compact("produk", "tipeproduk", "reservasi"));
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nohp' => 'required|numeric',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'lama_sewa' => 'required|numeric',
            'dp' => 'required|numeric',
            'total' => 'required|numeric',
            'ktp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'produk_id' => 'required|exists:produks,id',
        ]);

        // Cek stok produk tersedia
        $produk = Produk::find($validatedData['produk_id']);
        if ($produk->stok <= 0) {
            return redirect()->back()->with('error', 'Mohon maaf, stok produk yang Anda pilih sudah habis.');
        }

        // Simpan data reservasi ke database
        $reservasi = new Reservasi();
        $reservasi->nama = $validatedData['nama'];
        $reservasi->nohp = $validatedData['nohp'];
        $reservasi->alamat = $validatedData['alamat'];
        $reservasi->jenis_kelamin = $validatedData['jenis_kelamin'];
        $reservasi->lama_sewa = $validatedData['lama_sewa'];
        $reservasi->dp = $validatedData['dp'];
        $reservasi->total = $validatedData['total'];
        $reservasi->produk_id = $validatedData['produk_id'];
        $reservasi->user_id = auth()->id(); // Simpan ID pengguna saat ini

        // Upload gambar KTP
        if ($request->hasFile('ktp')) {
            $file = $request->file('ktp');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/ktp'), $filename);
            $reservasi->ktp = $filename;
        }

        $reservasi->save();

        // Kurangi stok produk
        $produk->stok = max(0, $produk->stok - 1); // Menghindari stok negatif
        $produk->save();

        // Redirect ke halaman sukses
        return redirect()->route('produkdetail.checkout', ['id' => $reservasi->id])->with('status', 'Reservasi berhasil!');
    }

    public function checkout($id)
    {
        $reservasi = Reservasi::findOrFail($id);

        return view('pengguna.checkout.V_index', compact('reservasi'));
    }

    public function uploadBuktiPembayaran(Request $request, $id)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $reservasi = Reservasi::findOrFail($id);

        // Cek apakah bukti pembayaran sudah ada untuk reservasi ini
        $buktiPembayaran = $reservasi->buktiPembayaran;
        if (!$buktiPembayaran) {
            // Jika belum ada, buat baru
            $buktiPembayaran = new BuktiPembayaran();
            $buktiPembayaran->reservasi_id = $reservasi->id;
        }

        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/bukti_pembayaran'), $filename);
            $buktiPembayaran->bukti_pembayaran = $filename;
        }

        $buktiPembayaran->status_konfirmasi = false; // Menunggu konfirmasi admin
        $buktiPembayaran->save();

        return redirect()->route('produkdetail.checkout', $reservasi->id)->with('status', 'Bukti pembayaran berhasil diunggah, menunggu konfirmasi.');
    }
}
