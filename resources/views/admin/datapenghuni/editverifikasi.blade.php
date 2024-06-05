@foreach($reservasi as $index => $reservation)
<div class="modal fade" id="exampleModalEdit{{ $reservation->id }}" aria-hidden="true"
    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Konten Modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Detail Penghuni Verifikasi {{ $reservation->nama }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Data Penghuni -->
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Penghuni</label>
                                <input type="nama" class="form-control" id="nama"
                                    value="{{ $reservation->nama }}" readonly>
                                <label for="nohp" class="form-label">Nomor Telepon</label>
                                <input type="nohp" class="form-control" id="nohp"
                                    value="{{ $reservation->nohp }}" readonly>
                                <label for="alamat" class="form-label">Alamat Penghuni</label>
                                <input type="alamat" class="form-control" id="alamat"
                                    value="{{ $reservation->alamat }}" readonly>
                                <label for="dp" class="form-label">Uang Masuk (DP)</label>
                                <input type="dp" class="form-control" id="dp"
                                    value="Rp {{ number_format($reservation->dp, 0, ',', '.') }}" readonly>
                                <label for="totalpembayaran" class="form-label">Uang Masuk (totalpembayaran)</label>
                                <input type="totalpembayaran" class="form-control" id="totalpembayaran"
                                    value="Rp {{ number_format($reservation->total, 0, ',', '.') }}" readonly>
                            </div>
                            <!-- Kolom lainnya -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-end">
                            <!-- Tombol Verifikasi -->
                            <button class="btn btn-success" data-bs-target="#exampleModalToggle2{{ $reservation->id }}"
                                data-bs-toggle="modal">Verifikasi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach($reservasi as $index => $reservation)
<div class="modal fade" id="exampleModalToggle2{{ $reservation->id }}" aria-hidden="true"
    aria-labelledby="exampleModalToggleLabel2{{ $reservation->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2{{ $reservation->id }}">Verifikasi Penghuni</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="{{ route('penghuni.update', $reservation->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="reservasi_id" value="{{ $reservation->id }}">
                        <div class="mb-3">
                            <label for="pesan_verifikasi{{ $reservation->id }}" class="form-label">Pesan Verifikasi</label>
                            <textarea name="pesan_verifikasi" class="form-control" id="pesan_verifikasi{{ $reservation->id }}" cols="30" rows="3" required></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-end">
                                <button class="btn btn-success">Verifikasi</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-danger" type="button" data-bs-target="#exampleModalEdit{{ $reservation->id }}" data-bs-toggle="modal">Kembali</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
