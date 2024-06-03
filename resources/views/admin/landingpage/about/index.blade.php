@extends('admin.layouts.main')
@section('title', 'About')

@section('content')
    <!-- Konten halaman -->
    <div class="page-content">
        <!-- Navigasi breadcrumb -->
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Table</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data About</li>
            </ol>
        </nav>

        <!-- Tabel data about -->
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <!-- Judul dan tombol tambah -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="card-title mb-0">Data About</h6>
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
                            @if (session('gagal'))
                                <div class="alert alert-danger">
                                    {{ session('gagal') }}
                                </div>
                            @endif
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
                                        @foreach ($about as $item)
                                        <tr>
                                            <td class="text-justify">{{ $loop->iteration }}</td>
                                            <td class="text-justify"><img src="{{ Storage::url($item->gambar) }}"
                                                style="width: 25%;"></td>
                                            <td class="text-justify">{{ $item->teks1 }}</td>
                                            <td class="text-justify">{{ $item->teks2 }}</td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a class="btn btn-primary mx-2" data-bs-toggle="modal"
                                                        href="#exampleModalEdit{{ $item->id }}" role="button"><i
                                                            class="bi bi-pencil-square"></i>
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('about.destroy', $item->id) }}" method="POST">
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

    @include('admin.landingpage.about.edit')

   {{-- Modal Tambah --}}
    <div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header hader">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Tambah About
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!-- Input gambar -->
                        <div class="form-group">
                            <label for="gambar"> Gambar </label>
                            <input type="file" class="form-control" name="gambar" id="gambar">
                        </div>
                        <!-- Input teks 1 -->
                        <div class="form-group">
                            <label for="teks1">Teks 1</label>
                            <textarea class="form-control" name="teks1" id="teks1" placeholder="Masukkan teks1" rows="4">@error('teks1') is-invalid @enderror{{ old('teks1') }}</textarea>
                            @error('teks1')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Input teks 2 -->
                        <div class="form-group">
                            <label for="teks2">Teks 2</label>
                            <textarea class="form-control" name="teks2" id="teks2" placeholder="Masukkan teks2" rows="4">@error('teks2') is-invalid @enderror{{ old('teks2') }}</textarea>
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
