@extends('admin.layouts.main')
@section('title', 'Tipe Produk')

@section('content')
    <!-- Konten halaman -->
    <div class="page-content">
        <!-- Navigasi breadcrumb -->
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Table</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Tipe Produk</li>
            </ol>
        </nav>

        <!-- Tabel data tipe Produk -->
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <!-- Judul dan tombol tambah -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="card-title mb-0">Data Tipe Produk</h6>
                            <div>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalTambah">
                                    Tambah +
                                </a>
                            </div>
                        </div>
                        <!-- Tabel -->
                        <div class="table-responsive">
                            @if (session('berhasil'))
                                <div class="alert alert-success">
                                    {{ session('berhasil') }}
                                </div>
                            @endif
                            <div class="card-body p-0">
                                <table id="dataTableExample" class="table">
                                    <!-- Kolom tabel -->
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Tipe Produk</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <!-- Isi tabel -->
                                    <tbody>
                                        @foreach ($tipeproduk as $data)
                                            <tr>
                                                <td class="text-justify">{{ $loop->iteration }}</td>
                                                <td class="text-justify">{{ $data->tipe_produk }}</td>
                                                <td class="text-justify">{{ $data->harga }}</td>
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center">
                                                        <a class="btn btn-primary mx-2" data-bs-toggle="modal"
                                                            href="#exampleModalEdit{{ $data->id }}" role="button"><i
                                                                class="bi bi-pencil-square"></i>
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('tipeprodukkamar.destroy', $data->id) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger me-2"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                                <i class="bi bi-trash"></i> Hapus
                                                            </button>
                                                        </form>
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

    @include('admin.produkkamar.tipeprodukkamar.edit')

   {{-- Modal Tambah --}}
    <div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header hader">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Tambah Tipe Produk
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tipeprodukkamar.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label>Tipe Produk</label>
                                    <input type="tipe_produk" name="tipe_produk"
                                        class="form-control @error('tipe_produk') is-invalid @enderror"
                                        placeholder="Masukkan tipe Produk" aria-describedby="basic-addon1" required>
                                    @error('tipe_produk')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label>Harga</label>
                                    <input type="harga" name="harga"
                                        class="form-control @error('harga') is-invalid @enderror"
                                        placeholder="Masukkan harga" aria-describedby="basic-addon1" required>
                                    @error('harga')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
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
