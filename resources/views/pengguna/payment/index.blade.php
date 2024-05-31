@extends('pengguna.layouts_user.main')

@section('title')
    {{ trans('Checkout') }}
@endsection

@section('content')
<div class="container pt-5">
    <section>
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="{{ url('history') }}" class="btn btn-primary mb-2"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('history') }}">Riwayat Pemesanan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Sukses Check Out</h4>
                        <p>Booking kamar berhasil selanjutnya untuk pembayaran silahkan transfer di rekening <strong>Bank MANDIRI Nomer Rekening: 134-00-1482176-2</strong> dengan nominal: <strong>Rp. </strong></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5><i class="fa fa-shopping-cart"></i> Detail Pemesanan </h5>
                        <p class="text-right">Tanggal Pesan: </p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Uang DP</th>
                                    <th class="text-center">Lama Sewa</th>
                                    <th class="text-center">Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{-- <td class="text-center">1</td>
                                    <td class="text-center">{{ $reservasi->nama }}</td>
                                    <td class="text-center">Rp. {{ number_format($reservasi->dp) }}</td>
                                    <td class="text-center">{{ $reservasi->lama_sewa }} bulan</td>
                                    <td class="text-right">Rp. {{ number_format($reservasi->total) }}</td> --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Unggah Bukti Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="bukti_pembayaran" class="form-label">Unggah Bukti Pembayaran</label>
                                <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Unggah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
