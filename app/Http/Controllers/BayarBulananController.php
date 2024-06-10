<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use App\Models\BuktiPembayaran;
use Illuminate\Support\Facades\Log;

class BayarBulananController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data pengguna untuk dropdown
        $users = User::where('level', 0)->get();
        $reservasi = Reservasi::all();

        // Ambil data pembayaran dengan relasi reservasi dan user
        $pembayarans = BuktiPembayaran::with(['reservasi.user'])
            ->where('status_konfirmasi', true)
            ->paginate(5);

        // Debugging
        foreach ($pembayarans as $pembayaran) {
            Log::info('Pembayaran ID: ' . $pembayaran->id . ', User Name: ' . optional($pembayaran->user)->name);
        }

        // Kembalikan tampilan sambil mengirimkan data pembayaran
        return view('admin.pembayaran.bayarbulanan.bayarbulan', compact('pembayarans', 'users', 'reservasi'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal_masuk_uang' => 'required|date',
            'jumlah_uang' => 'required|numeric',
            'keterangan' => 'required|string|max:255',
            'reservasi_id' => 'required|exists:reservasis,id'
        ]);

        $pembayaran = new BuktiPembayaran();
        $pembayaran->user_id = auth()->id(); // Mengambil ID pengguna yang sedang masuk
        $pembayaran->reservasi_id = $request->reservasi_id;
        $pembayaran->tanggal_masuk_uang = $validatedData['tanggal_masuk_uang'];
        $pembayaran->jumlah_uang = $validatedData['jumlah_uang'];
        $pembayaran->keterangan = $validatedData['keterangan'];
        $pembayaran->status_konfirmasi = true; // Set status konfirmasi menjadi true

        $pembayaran->save();

        if ($pembayaran) {
            return redirect()->route('bayarbulanan.index')->with('berhasil', 'Pembayaran baru telah ditambahkan dan dikonfirmasi.');
        } else {
            return redirect()->route('bayarbulanan.index')->with('gagal', 'Pembayaran baru gagal ditambahkan. Silakan coba lagi.');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tanggal_masuk_uang' => 'required|date',
            'jumlah_uang' => 'required|numeric',
            'keterangan' => 'required|string|max:255',
        ]);

        $pembayaran = BuktiPembayaran::findOrFail($id);
        $pembayaran->tanggal_masuk_uang = $validatedData['tanggal_masuk_uang'];
        $pembayaran->jumlah_uang = $validatedData['jumlah_uang'];
        $pembayaran->keterangan = $validatedData['keterangan'];
        $pembayaran->save();

        return redirect()->route('bayarbulanan.index')->with('success', 'Pembayaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pembayaran = BuktiPembayaran::findOrFail($id);
        $pembayaran->delete();

        return redirect()->route('bayarbulanan.index')->with('success', 'Pembayaran berhasil dihapus.');
    }
}
