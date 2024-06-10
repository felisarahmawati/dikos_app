@foreach($reservasi as $index => $reservation)
<div class="modal fade" id="exampleModalEdit{{ $reservation->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $reservation->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel{{ $reservation->id }}">Edit Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pembayaran.update', $reservation->buktiPembayaran->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Penghuni</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $reservation->user->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_dp" class="form-label">Tanggal DP</label>
                        <input type="date" class="form-control" id="tanggal_dp" name="tanggal_dp" value="{{ $reservation->created_at->format('Y-m-d') }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="dp" class="form-label">DP</label>
                        <input type="text" class="form-control" id="dp" name="dp" value="Rp {{ number_format($reservation->dp, 0, ',', '.') }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="total_pembayaran" class="form-label">Total Pembayaran</label>
                        <input type="text" class="form-control" id="total_pembayaran" name="total_pembayaran" value="Rp {{ number_format($reservation->total, 0, ',', '.') }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_masuk_uang" class="form-label">Tanggal Masuk Uang</label>
                        <input type="date" class="form-control" id="tanggal_masuk_uang" name="tanggal_masuk_uang" value="{{ $reservation->buktiPembayaran->tanggal_masuk_uang }}">
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_uang" class="form-label">Jumlah Uang</label>
                        <input type="number" class="form-control" id="jumlah_uang" name="jumlah_uang" value="{{ $reservation->buktiPembayaran->jumlah_uang }}">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $reservation->buktiPembayaran->keterangan }}">
                    </div>
                </div>
                <div class="modal-footer d-md-block">
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
