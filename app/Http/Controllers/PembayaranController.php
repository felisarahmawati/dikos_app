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
        $users = User::all();

        // Mendapatkan input pencarian dari query string
        $search = $request->input('search');

        $query = Reservasi::with(['user', 'buktiPembayaran'])
            ->whereHas('buktiPembayaran', function ($query) {
                $query->where('status_konfirmasi', true);
            });

        // Jika ada input pencarian, tambahkan kondisi pencarian ke dalam query
        if ($search) {
            $query->whereHas('user', function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            });
        }

        // Lakukan paginate untuk hasil query
        $reservasi = $query->paginate(5);

        return view('admin.pembayaran.index', compact('reservasi', 'users'));
    }

    public function store(Request $request)
    {
        // Validasi data pembayaran
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'tanggal_masuk_uang' => 'required|date',
            'jumlah_uang' => 'required|numeric',
            'bukti_transfer' => 'required|image|max:2048', // max 2MB
            'keterangan' => 'required|string|max:255',
        ]);

        // Ambil pengguna berdasarkan id yang diberikan
        $user = User::findOrFail($validatedData['user_id']);

        // Simpan bukti pembayaran
        $buktiPembayaran = new BuktiPembayaran();
        $buktiPembayaran->user_id = $validatedData['user_id']; // Simpan user_id
        $buktiPembayaran->tanggal_masuk_uang = $validatedData['tanggal_masuk_uang'];
        $buktiPembayaran->jumlah_uang = $validatedData['jumlah_uang'];
        $buktiPembayaran->keterangan = $validatedData['keterangan'];

        if ($request->hasFile('bukti_transfer')) {
            $image = $request->file('bukti_transfer');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/bukti_pembayaran'), $imageName);
            $buktiPembayaran->bukti_pembayaran = $imageName;
        }

        

        $buktiPembayaran->save();
        

        // Redirect kembali ke halaman pembayaran dengan pesan sukses
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
{
    // Validasi data pembayaran
    $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id',
        'tanggal_masuk_uang' => 'required|date',
        'jumlah_uang' => 'required|numeric',
        'bukti_transfer' => 'nullable|image|max:2048', // max 2MB
        'keterangan' => 'required|string|max:255',
    ]);

    // Cari data pembayaran yang akan diperbarui
    $buktiPembayaran = BuktiPembayaran::findOrFail($id);

    // Perbarui data pembayaran
    $buktiPembayaran->user_id = $validatedData['user_id'];
    $buktiPembayaran->tanggal_masuk_uang = $validatedData['tanggal_masuk_uang'];
    $buktiPembayaran->jumlah_uang = $validatedData['jumlah_uang'];
    $buktiPembayaran->keterangan = $validatedData['keterangan'];

    // Jika ada file bukti transfer yang diunggah, perbarui juga gambar
    if ($request->hasFile('bukti_transfer')) {
        $image = $request->file('bukti_transfer');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/bukti_pembayaran'), $imageName);
        $buktiPembayaran->bukti_pembayaran = $imageName;
    }

    // Simpan perubahan
    $buktiPembayaran->save();

    // Redirect kembali ke halaman pembayaran dengan pesan sukses
    return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil diperbarui.');
}


}
