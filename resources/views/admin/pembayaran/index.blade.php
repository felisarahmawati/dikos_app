@extends('admin.layouts.main')
@section('title', 'Pembayaran')

@section('content')
    <!-- Konten halaman -->
    <div class="page-content">
        <!-- Navigasi breadcrumb -->
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Table</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Pembayaran</li>
            </ol>
        </nav>

        <!-- Tabel data home -->
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <!-- Judul dan tombol tambah -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="card-title mb-0">Data Pembayaran</h6>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="search2" style="margin-top: 10px;">
                                <label>
                                    <input type="text" placeholder="Cari Disini">
                                    <ion-icon name="search-outline"></ion-icon>
                                </label>
                            </div>
                        </div>
                        <!-- Tabel -->
                        <div class="table-responsive">
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
                                        {{-- <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a class="btn btn-warning mx-2" data-bs-toggle="modal" href="#exampleModalEdit" role="button">
                                                        <i class="bi bi-pencil-square"></i> Detail
                                                    </a>
                                                </div>
                                            </td>
                                        </tr> --}}
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
