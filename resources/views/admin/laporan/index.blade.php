@extends('admin.layouts.main')
@section('title', 'Laporan')

@section('content')
    <!-- Konten halaman -->
    <div class="page-content">
        <!-- Navigasi breadcrumb -->
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Table</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Laporan Pemesanan</li>
            </ol>
        </nav>

        <!-- Tabel data home -->
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <!-- Judul dan tombol tambah -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="card-title mb-0">Data Laporan Pemesanan</h6>
                        </div>
                        <!-- Tabel -->
                        <div class="table-responsive">
                            <div class="col-md-12">
                                <div class="card shadow mb-4">
                                    <!-- Button trigger modal -->
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">
                                            Export Custom Date Data @yield('title')
                                        </h6>
                                    </div>
                                    <div class="mx-3 my-3">
                                        <a href="{{ route('laporan.exportCsv') }}" class="btn btn-primary">
                                            Export Laporan Penghuni Excel .CSV
                                        </a>
                                        <a href="{{ route('laporan.exportPdf') }}" class="btn btn-primary mx-2">
                                            PDF Laporan Penghuni
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <table id="dataTableExample" class="table">
                                    <!-- Kolom tabel -->
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Tanggal Pemesanan</th>
                                            <th class="text-center">Nama Penyewa</th>
                                            <th class="text-center">Durasi Sewa</th>
                                            <th class="text-center">Status Pemesanan</th>
                                        </tr>
                                    </thead>
                                    <!-- Isi tabel -->
                                    <tbody>
                                        @foreach ($laporan as $data)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $data->created_at->format('Y-m-d') }}</td>
                                                <td class="text-center">{{ $data->user->name }}</td>
                                                <td class="text-center">{{ $data->lama_sewa }} bulan</td>
                                                <td class="text-center">{{ $data->buktiPembayaran->status_konfirmasi ? 'Terkonfirmasi' : 'Belum Dikonfirmasi' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
