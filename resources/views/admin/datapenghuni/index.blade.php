@extends('admin.layouts.main')
@section('title', 'Penghuni')

@section('content')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Table</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Penghuni</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
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
                    <div class="table-responsive">
                        @if(session('message'))
                            <div class="alert alert-success mt-3">
                                {{ session('message') }}
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger mt-3">
                                {{ $errors->first() }}
                            </div>
                        @endif
                        <div class="card-body p-0">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">KTP</th>
                                        <th class="text-center">Bukti Pembayaran</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">No Telp</th>
                                        <th class="text-center">DP</th>
                                        <th class="text-center">Total Pembayaran</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Pesan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reservasi as $index => $reservation)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center"><img src="{{ asset('uploads/ktp/' . $reservation->ktp) }}" alt="KTP" width="100"></td>
                                        <td class="text-center">
                                            @if($reservation->buktiPembayaran && $reservation->buktiPembayaran->bukti_pembayaran)
                                                <img src="{{ asset('uploads/bukti_pembayaran/' . $reservation->buktiPembayaran->bukti_pembayaran) }}" alt="Bukti Pembayaran" width="100">
                                            @else
                                                <span class="text-danger">Tidak ada bukti pembayaran</span>
                                            @endif
                                        </td>
                                        <td class="text-justify">{{ $reservation->user->name }}</td>
                                        <td class="text-justify">{{ $reservation->user->email }}</td>
                                        <td class="text-justify">{{ $reservation->nohp }}</td>
                                        <td class="text-justify">Rp {{ number_format($reservation->dp, 0, ',', '.') }}</td>
                                        <td class="text-justify">Rp {{ number_format($reservation->total, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            @if($reservation->buktiPembayaran?->status_konfirmasi)
                                                <span class="badge bg-success">Dikonfirmasi</span>
                                            @else
                                                <span class="badge bg-warning">Menunggu Konfirmasi</span>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $reservation->buktiPembayaran?->pesan }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center">
                                                <a class="btn btn-primary mx-2" data-bs-toggle="modal"
                                                    href="#exampleModalEdit{{ $reservation->id }}" role="button"><i
                                                        class="bi bi-pencil-square"></i>
                                                    Verifikasi
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-3">
                                {{ $reservasi->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.datapenghuni.editverifikasi')

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.btn-verifikasi').click(function() {
            var reservasiId = $(this).data('reservasi-id');
            $('#reservasiId').val(reservasiId);
        });
    });
</script>
@endsection


