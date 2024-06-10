<?php

namespace App\Http\Controllers;

use App\Models\BuktiPembayaran;
use App\Models\Reservasi;
use App\Models\User;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil data pencarian dari query string
        $search = $request->input('search');

        // Membuat query untuk mengambil data reservasi dengan relasi user dan bukti pembayaran
        $query = Reservasi::with(['user', 'buktiPembayaran'])
                ->whereHas('buktiPembayaran', function ($query) {
                    $query->where('status_konfirmasi', true);
                });

        // Jika ada pencarian, tambahkan kondisi pencarian ke dalam query
        if ($search) {
            $query->whereHas('user', function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            });
        }

        // Ambil data pengguna untuk dropdown
        $users = User::where('level', 0)->get();

        // Pagination data reservasi
        $reservasi = $query->paginate(5);

        // Kembalikan tampilan sambil mengirimkan data reservasi dan data pengguna
        return view('admin.pembayaran.index', compact('reservasi', 'users'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tanggal_masuk_uang' => 'required|date',
            'jumlah_uang' => 'required|numeric',
            'keterangan' => 'required|string|max:255',
        ]);

        // Ambil bukti pembayaran berdasarkan ID
        $buktiPembayaran = BuktiPembayaran::findOrFail($id);

        // Perbarui atribut-atribut yang sesuai dengan data yang diterima dari permintaan
        $buktiPembayaran->tanggal_masuk_uang = $validatedData['tanggal_masuk_uang'];
        $buktiPembayaran->jumlah_uang = $validatedData['jumlah_uang'];
        $buktiPembayaran->keterangan = $validatedData['keterangan'];

        // Simpan perubahan ke dalam database
        $buktiPembayaran->save();

        // Redirect kembali ke halaman pembayaran.index dengan pesan sukses
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil diperbarui.');
    }
}
