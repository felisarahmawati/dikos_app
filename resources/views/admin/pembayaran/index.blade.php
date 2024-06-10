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
                                    <input type="text" id="searchInput" placeholder="Cari Disini">
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
                                            <th class="text-center">Tanggal DP</th>
                                            <th class="text-center">Tanggal Pelunasan</th>
                                            <th class="text-center">DP</th>
                                            <th class="text-center">Total Pembayaran</th>
                                            <th class="text-center">Pelunasan</th>
                                            <th class="text-center">Keterangan</th>
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
                                            <td class="text-center">{{ $reservation->buktiPembayaran->tanggal_masuk_uang }}</td>
                                            <td class="text-center">
                                                Rp {{ number_format($reservation->dp, 0, ',', '.') }}
                                            </td>
                                            <td class="text-center">
                                                Rp {{ number_format($reservation->total, 0, ',', '.') }}
                                            </td>
                                            <td class="text-center">Rp {{ number_format($reservation->buktipembayaran->jumlah_uang, 0, ',', '.') }}</td>
                                            <td class="text-center">{{ $reservation->buktiPembayaran->keterangan }}</td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a class="btn btn-primary mx-2" data-bs-toggle="modal" href="#exampleModalEdit{{ $reservation->id }}" role="button">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </a>
                                                    <a class="btn btn-warning mx-2" data-bs-toggle="modal" href="#exampleModalDetail{{ $reservation->id }}" role="button">
                                                        <i class="bi bi-pencil-square"></i> Detail
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center mt-3">
                                    {{ $reservasi->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.pembayaran.edit');


    <!-- Modal Tambah Pembayaran -->
<div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formTambahPembayaran" action="{{ route('pembayaran.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Nama Pengguna</label>
                        <select class="form-select" id="user_id" name="user_id" required>
                            <option value="">-- Pilih Nama Pengguna --</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="reservasi_id" class="form-label">Reservasi</label>
                        <select class="form-select" id="reservasi_id" name="reservasi_id" required>
                            <option value="">-- Pilih Reservasi --</option>
                            @foreach ($reservasi as $reservasis)
                                <option value="{{ $reservasis->id }}">{{ $reservasis->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Input Tanggal Masuk Uang -->
                    <div class="mb-3">
                        <label for="tanggal_masuk_uang" class="form-label">Tanggal Masuk Uang</label>
                        <input type="date" class="form-control" id="tanggal_masuk_uang" name="tanggal_masuk_uang" placeholder="masukkan tanggal masuk uang" required>
                    </div>
                    <!-- Input Jumlah Uang -->
                    <div class="mb-3">
                        <label for="jumlah_uang" class="form-label">Jumlah Uang</label>
                        <input type="number" class="form-control" id="jumlah_uang" name="jumlah_uang" placeholder="masukkan jumlah uang" required>
                    </div>
                    <!-- Input Keterangan -->
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="masukkan keterangan" required>
                    </div>
                </div>
                <div class="modal-footer d-md-block">
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- Modal Detail -->
    @foreach($reservasi as $index => $reservation)
    <div class="modal fade" id="exampleModalDetail{{ $reservation->id }}" tabindex="-1" aria-labelledby="exampleModalLabelDetail{{ $reservation->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width: 40%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelDetail{{ $reservation->id }}">Detail Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Penghuni</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $reservation->user->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_dp" class="form-label">Tanggal DP</label>
                        <input type="date" class="form-control" id="tanggal_dp" name="tanggal_dp" value="{{ $reservation->created_at->format('Y-m-d') }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="dp" class="form-label">DP</label>
                        <input type="text" class="form-control" id="dp" name="dp" value="{{ $reservation->dp }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="total_pembayaran" class="form-label">Total Pembayaran</label>
                        <input type="text" class="form-control" id="total_pembayaran" name="total_pembayaran" value="{{ $reservation->total }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_masuk_uang" class="form-label">Tanggal Masuk Uang</label>
                        <input type="date" class="form-control" id="tanggal_masuk_uang" name="tanggal_masuk_uang" value="{{ $reservation->buktiPembayaran->tanggal_masuk_uang }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_uang" class="form-label">Jumlah Uang</label>
                        <input type="number" class="form-control" id="jumlah_uang" name="jumlah_uang" value="{{ $reservation->buktiPembayaran->jumlah_uang }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $reservation->buktiPembayaran->keterangan }}" readonly>
                    </div>
                </div>
                <div class="modal-footer d-md-block">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("formTambahPembayaran").addEventListener("submit", function (event) {
            var reservasiId = document.getElementById("reservasi_id").value;
            var tanggalMasukUang = document.getElementById("tanggal_masuk_uang").value;
            var jumlahUang = document.getElementById("jumlah_uang").value;
            var keterangan = document.getElementById("keterangan").value;

            if (!reservasiId || !tanggalMasukUang || !jumlahUang || !keterangan) {
                event.preventDefault();
                alert("Semua bidang harus diisi!");
            }
        });
    });
    </script>
@endsection
