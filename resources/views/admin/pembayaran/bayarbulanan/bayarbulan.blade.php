@extends('admin.layouts.main')
@section('title', 'Pembayaran Bulanan')

@section('content')
    <!-- Konten halaman -->
    <div class="page-content">
        <!-- Navigasi breadcrumb -->
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Table</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Bayar Bulanan</li>
            </ol>
        </nav>

        <!-- Tabel data home -->
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <!-- Judul dan tombol tambah -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="card-title mb-0">Data Bayar Bulanan</h6>
                            <div>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalTambah">
                                    Tambah +
                                </a>
                            </div>
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
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Nominal</th>
                                            <th class="text-center">Keterangan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <!-- Isi tabel -->
                                    <tbody>
                                        @foreach($pembayarans as $index => $pembayaran)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $pembayaran->reservasi->user->name }}</td>
                                            <td>{{ $pembayaran->tanggal_masuk_uang }}</td>
                                            <td>Rp {{ number_format($pembayaran->jumlah_uang, 0, ',', '.') }}</td>
                                            <td>{{ $pembayaran->keterangan }}</td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a class="btn btn-primary mx-2" data-bs-toggle="modal" href="#exampleModalEdit{{ $pembayaran->id }}" role="button">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </a>
                                                    <a class="btn btn-warning mx-2" data-bs-toggle="modal" href="#exampleModalDetail{{ $pembayaran->id }}" role="button">
                                                        <i class="bi bi-pencil-square"></i> Detail
                                                    </a>
                                                    <form action="{{ route('bayarbulanan.destroy', $pembayaran->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger mx-2" onclick="return confirm('Apakah Anda yakin ingin menghapus pembayaran ini?');">
                                                            <i class="bi bi-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center mt-3">
                                    {{ $pembayarans->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.pembayaran.bayarbulanan.edit')

    <div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formTambahPembayaran" action="{{ route('bayarbulanan.store') }}" method="POST">
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

    @foreach($pembayarans as $pembayaran)
    <div class="modal fade" id="exampleModalDetail{{ $pembayaran->id }}" tabindex="-1" aria-labelledby="exampleModalDetailLabel{{ $pembayaran->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width: 40%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalDetailLabel{{ $pembayaran->id }}">Detail Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="detail_name" class="form-label">Nama Penghuni</label>
                        <input type="text" class="form-control" id="detail_name" value="{{ optional($pembayaran->reservasi->user)->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="detail_tanggal_masuk_uang" class="form-label">Tanggal Masuk Uang</label>
                        <input type="date" class="form-control" id="detail_tanggal_masuk_uang" value="{{ $pembayaran->tanggal_masuk_uang }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="detail_jumlah_uang" class="form-label">Jumlah Uang</label>
                        <input type="text" class="form-control" id="detail_jumlah_uang" value="Rp {{ number_format($pembayaran->jumlah_uang, 0, ',', '.') }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="detail_keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="detail_keterangan" value="{{ $pembayaran->keterangan }}" readonly>
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
