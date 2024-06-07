@foreach($reservasi as $index => $reservation)
<div class="modal fade" id="exampleModalEdit{{ $reservation->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $reservation->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 40%">
        <div class="modal-content">
            <div class="modal-header hader">
                <h6 class="modal-title" id="exampleModalLabel{{ $reservation->id }}">
                    Edit Data Pembayaran
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pembayaran.update', $reservation->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="user_id">Nama Penghuni</label>
                                <div>
                                    <select class="form-select" name="user_id" id="user_id" style="width: 100%">
                                        <option value="">-- Pilih --</option>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->user_id }}" {{ $user->user_id == $reservation->user->name ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gambar_new">Bukti Pembayaran</label>
                        <br><br>
                        <img src="{{ Storage::url($reservation->buktiPembayaran) }}" class="rounded shadow-sm" style="width: 35%;">
                        <br><br>
                        <input type="file" class="form-control" name="bukti_pembayaran" id="bukti_pembayaran">
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="tanggal_masuk_uang">Tanggal</label>
                                <input type="date" name="tanggal_masuk_uang" class="form-control" value="{{ $reservation->created_at->format('d/m/Y') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="keterangan">Keterangan</label>
                                <input type="textarea" name="keterangan" class="form-control" value="{{ $reservation->buktiPembayaran->keterangan }}">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer d-md-block">
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
