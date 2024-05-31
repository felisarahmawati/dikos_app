<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        $reservasi = Reservasi::all();

        return view('admin.datapenghuni.index', compact('reservasi'));
    }

    public function verifikasi(Request $request, $id)
    {
        $reservasi = Reservasi::findOrFail($id);

        // Lakukan validasi jika reservasi sudah diverifikasi sebelumnya
        if ($reservasi->status_konfirmasi) {
            return response()->json(['error' => 'Reservasi sudah diverifikasi sebelumnya.']);
        }

        // Lakukan verifikasi dan simpan pesan verifikasi
        $reservasi->status_konfirmasi = true;
        $reservasi->pesan_verifikasi = $request->pesan;
        $reservasi->save();

        return response()->json(['message' => 'Reservasi berhasil diverifikasi.']);
    }

}
