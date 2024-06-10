<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Support\Facades\Response;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Reservasi::with('user', 'buktiPembayaran')->get();
        return view('admin.laporan.index', compact('laporan'));
    }

    public function exportCsv()
    {
        $laporan = Reservasi::with('user', 'buktiPembayaran')->get();
        $filename = "laporan_penghuni.csv";

        $handle = fopen($filename, 'w+');
        fputcsv($handle, ['Tanggal Pemesanan', 'Nama Penyewa', 'Durasi Sewa', 'Status Pemesanan']);

        foreach ($laporan as $data) {
            fputcsv($handle, [
                $data->created_at->format('Y-m-d'),
                $data->user->name,
                $data->lama_sewa . ' bulan',
                $data->buktiPembayaran->status_konfirmasi ? 'Terkonfirmasi' : 'Belum Dikonfirmasi',
            ]);
        }

        fclose($handle);

        $headers = [
            'Content-Type' => 'text/csv',
        ];

        return Response::download($filename, $filename, $headers);
    }

    public function exportPdf()
    {
        $laporan = Reservasi::with('user', 'buktiPembayaran')->get();
        $pdf = PDF::loadView('admin.laporan.pdf', compact('laporan'));
        return $pdf->download('laporan_penghuni.pdf');
    }

    public function printPdf()
    {
        $laporan = Reservasi::with('user', 'buktiPembayaran')->get();
        $pdf = PDF::loadView('admin.laporan.pdf', compact('laporan'));
        return $pdf->stream('laporan_penghuni.pdf');
    }
}
