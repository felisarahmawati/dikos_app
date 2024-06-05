<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        $reservasi = Reservasi::with('user', 'buktiPembayaran')->paginate(5);

        return view('admin.datapenghuni.index', compact('reservasi'));
    }

    public function update(Request $request, $id)
    {
        $reservasi = Reservasi::findOrFail($id);

        // Lakukan validasi jika reservasi sudah diverifikasi sebelumnya
        if ($reservasi->buktiPembayaran && $reservasi->buktiPembayaran->status_konfirmasi) {
            return redirect()->back()->withErrors(['error' => 'Reservasi sudah diverifikasi sebelumnya.']);
        }

        // Lakukan verifikasi dan simpan pesan verifikasi
        if ($reservasi->buktiPembayaran) {
            $reservasi->buktiPembayaran->status_konfirmasi = true;
            $reservasi->buktiPembayaran->pesan = $request->pesan_verifikasi; // Simpan pesan verifikasi
            $reservasi->buktiPembayaran->save();
        }

        $reservasi->save();

        return redirect()->route('penghuni.index')->with('message', 'Reservasi berhasil diverifikasi.');
    }
}
