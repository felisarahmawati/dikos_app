@extends('admin.layouts.main')
@section('title', 'Penghuni')

@section('content')
    <!-- Konten halaman -->
    <div class="page-content">
        <!-- Navigasi breadcrumb -->
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Table</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Penghuni</li>
            </ol>
        </nav>

        <!-- Tabel data home -->
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <!-- Judul dan tombol tambah -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="card-title mb-0">Data Penghuni</h6>
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
                                            <th class="text-center">KTP</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">No Telp</th>
                                            <th class="text-center">Kamar</th>
                                            <th class="text-center">Total Pembayaran</th>
                                            <th class="text-center">DP</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Pesan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <!-- Isi tabel -->
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a class="btn btn-primary mx-2" data-bs-toggle="modal"
                                                        href="#exampleModalDetail" role="button"><i
                                                            class="bi bi-pencil-square"></i>
                                                        Verifikasi
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
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
