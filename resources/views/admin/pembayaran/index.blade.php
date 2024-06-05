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
                            <div>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalTambah">
                                    Tambah +
                                </a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <form action="{{ url()->current() }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Cari Nama Penghuni">
                                        <ion-icon name="search-outline"></ion-icon>
                                </div>
                            </form>
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
                                            <th class="text-center">Status Bayar</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <!-- Isi tabel -->
                                    <tbody>
                                        @foreach($reservasi as $index => $reservation)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td class="text-center">{{ $reservation->user->name }}</td>
                                            <td class="text-center">{{ $reservation->created_at->format('d/m/Y') }}</td>
                                            <td class="text-center">
                                                @if($reservation->buktiPembayaran && $reservation->buktiPembayaran->bukti_pembayaran)
                                                    <img src="{{ asset('uploads/bukti_pembayaran/' . $reservation->buktiPembayaran->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="img-thumbnail" width="100">
                                                @else
                                                    <span class="text-danger">Tidak ada bukti pembayaran</span>
                                                @endif
                                            </td>
                                            <td></td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a class="btn btn-warning mx-2" data-bs-toggle="modal" href="#exampleModalEdit{{ $reservation->id }}" role="button">
                                                        <i class="bi bi-pencil-square"></i> Detail
                                                    </a>
                                                </div>
                                            </td>
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

    <!-- Modal Tambah Pembayaran -->
    <div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!-- Input Nama Penghuni (diambil dari tabel user) -->
                        <div class="mb-3">
                            <label for="user_id" class="form-label">Nama Penghuni</label>
                            <select class="form-select" id="user_id" name="user_id" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Input Tanggal Masuk Uang -->
                        <div class="mb-3">
                            <label for="tanggal_masuk_uang" class="form-label">Tanggal Masuk Uang</label>
                            <input type="date" class="form-control" id="tanggal_masuk_uang" name="tanggal_masuk_uang" required>
                        </div>
                        <!-- Input Jumlah Uang -->
                        <div class="mb-3">
                            <label for="jumlah_uang" class="form-label">Jumlah Uang</label>
                            <input type="number" class="form-control" id="jumlah_uang" name="jumlah_uang" required>
                        </div>
                        <!-- Input Bukti Transfer -->
                        <div class="mb-3">
                            <label for="bukti_transfer" class="form-label">Bukti Transfer (Pelunasan)</label>
                            <input type="file" class="form-control" id="bukti_transfer" name="bukti_transfer" required>
                        </div>
                        <!-- Input Keterangan -->
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                        </div>
                    </div>
                    <!-- Tombol simpan dan batal -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
