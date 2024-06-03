@extends('admin.layouts.main')
@section('title', 'Penghuni')

@section('content')
<!-- Konten halaman -->
<div class="page-content">
    <!-- Navigasi breadcrumb -->
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Table</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Penghuni</li>
        </ol>
    </nav>

    <!-- Tabel data home -->
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <!-- Judul dan tombol tambah -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="card-title mb-0">Data Penghuni</h6>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="search2" style="margin-top: 10px;">
                            <label>
                                <input type="text" placeholder="Cari Disini">
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
                                        <th class="text-center">Bukti Pembayaran</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">No Telp</th>
                                        <th class="text-center">Kamar</th>
                                        <th class="text-center">Total Pembayaran</th>
                                        <th class="text-center">DP</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Pesan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <!-- Isi tabel -->
                                <tbody>
                                    @foreach($reservasi as $index => $reservation)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td class="text-center">
                                            @if($reservation->buktiPembayaran && $reservation->buktiPembayaran->bukti_pembayaran)
                                                <img src="{{ asset('uploads/bukti_pembayaran/' . $reservation->buktiPembayaran->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="img-thumbnail" width="100">
                                            @else
                                                <span class="text-danger">Tidak ada bukti pembayaran</span>
                                            @endif
                                        </td>
                                        <td class="text-justify">{{ $reservation->nama }}</td>
                                        <td class="text-justify">{{ $reservation->user->email }}</td>
                                        <td class="text-justify">{{ $reservation->nohp }}</td>
                                        <td class="text-justify">{{ $reservation->nama }}</td>
                                        <td class="text-justify">Rp {{ number_format($reservation->total, 0, ',', '.') }}</td>
                                        <td class="text-justify">Rp {{ number_format($reservation->dp, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            @if($reservation->buktiPembayaran?->status_konfirmasi)
                                                <span class="badge bg-success">Dikonfirmasi</span>
                                            @else
                                                <span class="badge bg-warning">Menunggu Konfirmasi</span>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $reservation->pesan }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center">
                                                <!-- Di dalam loop foreach untuk menampilkan data penghuni -->
                                                <button class="btn btn-primary mx-2 btn-verifikasi" data-reservasi-id="{{ $reservation->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal">Verifikasi</button>
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

 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Verifikasi Reservasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Di dalam form modal -->
            <div class="modal-body">
                <form id="verifikasiForm">
                    @csrf
                    <input type="hidden" id="reservasiId" name="reservasi_id">
                    <div class="mb-3">
                        <label for="pesan" class="col-form-label">Pesan Verifikasi:</label>
                        <textarea class="form-control" id="pesan" name="pesan"></textarea>
                    </div>
                </form>
            </div>

            <!-- Button Verifikasi -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="btnVerifikasi">Verifikasi</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.btn-verifikasi').click(function() {
            var reservasiId = $(this).data('reservasi-id');
            $('#reservasiId').val(reservasiId);
        });

        $('#btnVerifikasi').click(function() {
            var reservasiId = $('#reservasiId').val();
            var pesan = $('#pesan').val();

            // Validasi pesan
            if (pesan.trim() === '') {
                alert('Mohon masukkan pesan verifikasi.');
                return;
            }

            $.ajax({
                type: 'POST',
                url: '/verifikasi/' + reservasiId,
                data: {
                    _token: '{{ csrf_token() }}',
                    pesan: pesan
                },
                success: function(response) {
                    alert('Reservasi berhasil diverifikasi.');
                    $('#exampleModal').modal('hide');
                    location.reload(); // Refresh halaman setelah verifikasi
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan saat melakukan verifikasi.');
                }
            });
        });
    });
</script>
@endsection
