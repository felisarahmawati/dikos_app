@extends('admin.layouts.main')
@section('title', 'Laporan')

@section('content')
    <!-- Konten halaman -->
    <div class="page-content">
        <!-- Navigasi breadcrumb -->
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Table</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Laporan</li>
            </ol>
        </nav>

        <!-- Tabel data home -->
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <!-- Judul dan tombol tambah -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="card-title mb-0">Data Laporan</h6>
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
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exportCustom">
                                            Export Laporan Penghuni Excel .CSV
                                        </button>
                                        <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal"
                                            data-bs-target="#pdfCustom">
                                            PDF Laporan Penghuni
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <table id="dataTableExample" class="table">
                                    <!-- Kolom tabel -->
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Nama Penghuni</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Bukti Transfer</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <!-- Isi tabel -->
                                    <tbody>
                                       
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
