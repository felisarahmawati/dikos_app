@extends('pengguna.layouts_user.main')

@section('title')
    {{ trans('Riwayat Booking') }}
@endsection

@section('content')
<div class="container pt-5">
<section id="about" class="about section">
<div class="container section-title">
            <h2>Riwayat Pemesanan</h2>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Lama Sewa</th>
                    <th>Uang Masuk (DP)</th>
                    <th>Total Pembayaran</th>
                    <th>Foto Bukti KTP</th>
                    <th>Status Konfirmasi</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
    </section>
</div>
@endsection
