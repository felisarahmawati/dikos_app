@extends('pengguna.layouts_user.main')

@section('title')
    {{ trans('Riwayat Booking') }}
@endsection

@section('content')
<div class="container pt-5">
    <section id="riwayat" class="riwayat section">
        <div class="container section-title">
            <h2>Riwayat Pemesanan</h2>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Status Konfirmasi</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reservasi as $reservation)
                    <tr>
                        <td>{{ $reservation->nama }}</td>
                        <td>{{ $reservation->nohp }}</td>
                        <td>{{ $reservation->alamat }}</td>
                        <td>
                            @if($reservation->status_konfirmasi)
                                <span class="badge bg-success">Dikonfirmasi</span>
                            @else
                                <span class="badge bg-warning">Menunggu Konfirmasi</span>
                            @endif
                        </td>
                        <td><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $reservation->id }}">Lihat Detail</button></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data pemesanan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>

@foreach($reservasi as $reservation)
<!-- Modal Detail -->
<div class="modal fade" id="detailModal{{ $reservation->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $reservation->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel{{ $reservation->id }}">Detail Pemesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6><strong>Informasi Pemesan</strong></h6>
                        <p><strong>Nama:</strong> {{ $reservation->nama }}</p>
                        <p><strong>No HP:</strong> {{ $reservation->nohp }}</p>
                        <p><strong>Alamat:</strong> {{ $reservation->alamat }}</p>
                        <p><strong>Jenis Kelamin:</strong> {{ $reservation->jenis_kelamin }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6><strong>Informasi Pemesanan</strong></h6>
                        <p><strong>Lama Sewa:</strong> {{ $reservation->lama_sewa }} bulan</p>
                        <p><strong>Uang Masuk (DP):</strong> Rp {{ number_format($reservation->dp, 0, ',', '.') }}</p>
                        <p><strong>Total Pembayaran:</strong> Rp {{ number_format($reservation->total, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <h6><strong>Foto Bukti KTP</strong></h6>
                        <img src="{{ asset('uploads/ktp/' . $reservation->ktp) }}" alt="KTP" class="img-fluid img-thumbnail">
                    </div>
                    <div class="col-md-6">
                        <h6><strong>Foto Bukti Pembayaran</strong></h6>
                        @if($reservation->buktiPembayaran)
                            <img src="{{ asset('uploads/bukti_pembayaran/' . $reservation->buktiPembayaran->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="img-fluid img-thumbnail">
                        @else
                            <p>Tidak ada bukti pembayaran yang diunggah</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
