@foreach($pembayarans as $pembayaran)
<div class="modal fade" id="exampleModalEdit{{ $pembayaran->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $pembayaran->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel{{ $pembayaran->id }}">Edit Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('bayarbulanan.update', $pembayaran->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Penghuni</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ optional($pembayaran->reservasi->user)->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_masuk_uang" class="form-label">Tanggal Masuk Uang</label>
                        <input type="date" class="form-control" id="tanggal_masuk_uang" name="tanggal_masuk_uang" value="{{ $pembayaran->tanggal_masuk_uang }}">
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_uang" class="form-label">Jumlah Uang</label>
                        <input type="number" class="form-control" id="jumlah_uang" name="jumlah_uang" value="{{ $pembayaran->jumlah_uang }}">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $pembayaran->keterangan }}">
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
