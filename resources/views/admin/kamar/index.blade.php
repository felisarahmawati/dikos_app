@extends('admin.layouts.main')
@section('title', 'Kamar')

@section('content')
    <!-- Konten halaman -->
    <div class="page-content">
        <!-- Navigasi breadcrumb -->
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Table</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Kamar</li>
            </ol>
        </nav>

        <!-- Tabel data home -->
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <!-- Judul dan tombol tambah -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="card-title mb-0">Data Kamar</h6>
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
                            @if (session('berhasil'))
                                <div class="alert alert-success">
                                    {{ session('berhasil') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach
                                </div>
                            @endif
                            <div class="card-body p-0">
                                <table id="dataTableExample" class="table">
                                    <!-- Kolom tabel -->
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Tipe Kamar</th>
                                            <th class="text-center">Nomor Kamar</th>
                                            <th class="text-center">Gambar</th>
                                            <th class="text-center">Deskripsi</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <!-- Isi tabel -->
                                    <tbody>
                                        @foreach ($kamar as $data)
                                        <tr>
                                            <td class="text-justify">{{ $loop->iteration }}</td>
                                            <td class="text-justify">{{ $data->tipekamar->tipe_kamar }}</td>
                                            <td class="text-justify">{{ $data->nomor_kamar }}</td>
                                            <td class="text-justify"><img src="{{ Storage::url($data->gambar) }}"
                                                style="width: 50%;" style="height: 50%;"></td>
                                            <td class="text-justify">{{ $data->deskripsi }}</td>
                                            <td class="text-justify">{{ $data->tipekamar->harga }}</td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a class="btn btn-primary mx-2" data-bs-toggle="modal"
                                                        href="#exampleModalEdit{{ $data->id }}" role="button"><i
                                                            class="bi bi-pencil-square"></i>
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('kamar.destroy', $data->id) }}" method="POST">
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


    @include('admin.kamar.edit')

   {{-- Modal Tambah --}}
<div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header hader">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kamar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('kamar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="gambar">Gambar</label>
                                <input type="file" name="gambar" id="gambar" class="form-control">
                            </div>
                        </div><!-- Col -->
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="tipekamar">Tipe Kamar</label>
                                <div>
                                    <select class="form-select" name="tipekamar_id" id="tipekamar_id" style="width: 100%">
                                        <option value="">-- Pilih --</option>
                                        @if ($tipekamar)
                                            @foreach ($tipekamar as $sdata)
                                                <option value="{{ $sdata->id }}">{{ $sdata->tipe_kamar }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="nomor_kamar">Nomor Kamar</label>
                                <input type="text" name="nomor_kamar" class="form-control" placeholder="Masukkan nomor kamar">
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="harga">Harga</label>
                                <select class="form-select" name="tipekamar_id" id="tipekamar_id" style="width: 100%">
                                    <option value="">-- Pilih --</option>
                                    @if ($tipekamar)
                                        @foreach ($tipekamar as $sdata)
                                            <option value="{{ $sdata->id }}">{{ $sdata->harga }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div><!-- Col -->
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="deskripsi">Deskripsi</label>
                                <input type="text" name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi">
                            </div>
                        </div><!-- Col -->
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById('searchInput');

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('#dataTableExample tbody tr');

            tableRows.forEach(row => {
                const nomorKamar = row.querySelector('td:nth-child(3)').innerText.toLowerCase();
                if (nomorKamar.includes(searchTerm)) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>

