@extends('admin.layouts.main')
@section('title', 'Home')

@section('content')
    <!-- Konten halaman -->
    <div class="page-content">
        <!-- Navigasi breadcrumb -->
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Table</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Home</li>
            </ol>
        </nav>

        <!-- Tabel data home -->
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <!-- Judul dan tombol tambah -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="card-title mb-0">Data Home</h6>
                            <div>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalTambah">
                                    Tambah +
                                </a>
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
                                            <th class="text-center">Gambar</th>
                                            <th class="text-center">Teks 1</th>
                                            <th class="text-center">Teks 2</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <!-- Isi tabel -->
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center"></td>
                                            <td class="text-center">hahaha</td>
                                            <td class="text-center">hahaha</td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a class="btn btn-primary mx-2" data-bs-toggle="modal" href="#exampleModalEdit" role="button">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </a>
                                                    <form action="" method="POST">
                                                        <button type="submit" class="btn btn-danger me-2" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                            <i class="bi bi-trash"></i> Hapus
                                                        </button>
                                                    </form>
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

    @include('admin.landingpage.home.edit')

   {{-- Modal Tambah --}}
    <div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header hader">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Tambah Home
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <!-- Input gambar -->
                        <div class="form-group">
                            <label for="image"> Gambar </label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                        <!-- Input teks 1 -->
                        <div class="form-group">
                            <label for="teks1">Teks 1</label>
                            <input type="text" class="form-control" name="teks1" id="teks1"
                                placeholder="Masukkan teks1" @error('teks1') is-invalid @enderror
                                value="{{ old('teks1') }}">
                            @error('teks1')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Input teks 2 -->
                        <div class="form-group">
                            <label for="teks2">Teks 2</label>
                            <input type="text" class="form-control" name="teks1" id="teks1"
                                placeholder="Masukkan teks2" @error('teks2') is-invalid @enderror
                                value="{{ old('teks2') }}">
                            @error('teks2')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- Tombol simpan dan batal -->
                    <div class="modal-footer d-md-block">
                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                        <button type="button" class="btn btn-danger btn-sm">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
