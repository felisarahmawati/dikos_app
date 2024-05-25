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
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Kamar</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Status Konfirmasi</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data riwayat pemesanan disini -->
                    <tr>
                        <td>John Doe</td>
                        <td>Kamar A1</td>
                        <td>08123456789</td>
                        <td><span class="badge bg-success">Dikonfirmasi</span></td>
                        <td><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal1">Lihat Detail</button></td>
                    </tr>
                    <!-- Data riwayat pemesanan lainnya -->
                </tbody>
            </table>
        </div>
    </section>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="detailModal1" tabindex="-1" aria-labelledby="detailModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel1">Detail Pemesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6><strong>Informasi Pemesan</strong></h6>
                        <p><strong>Nama:</strong> John Doe</p>
                        <p><strong>No HP:</strong> 08123456789</p>
                        <p><strong>Alamat:</strong> Jl. Raya No. 123, Jakarta</p>
                        <p><strong>Jenis Kelamin:</strong> Laki-laki</p>
                    </div>
                    <div class="col-md-6">
                        <h6><strong>Informasi Pemesanan</strong></h6>
                        <p><strong>Kamar:</strong> Kamar A1</p>
                        <p><strong>Lama Sewa:</strong> 1 bulan</p>
                        <p><strong>Uang Masuk (DP):</strong> Rp 500.000</p>
                        <p><strong>Total Pembayaran:</strong> Rp 2.500.000</p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <h6><strong>Foto Bukti KTP</strong></h6>
                        <img src="path/to/image.jpg" alt="Bukti KTP" class="img-fluid img-thumbnail">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection
