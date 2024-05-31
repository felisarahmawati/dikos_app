@foreach ($kamar as $item)
    <div class="modal fade" id="exampleModalEdit{{ $item->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width: 40%">
            <div class="modal-content">
                <div class="modal-header hader">
                    <h6 class="modal-title" id="exampleModalLabel{{ $item->id }}">
                        Edit Data Kamar
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('kamar.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="gambar_new"> Gambar </label>
                            <br><br>
                            <img src="{{ Storage::url($item->gambar) }}" class="rounded shadow-sm" style="width: 35%;">
                            <br><br>
                            <input type="file" class="form-control" name="gambar" id="gambar_new">
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="tipekamar">Tipe Kamar</label>
                                    <div>
                                        <select class="form-select" name="tipekamar_id" id="tipekamar_id" style="width: 100%">
                                            <option value="">-- Pilih --</option>
                                            @foreach ($tipekamar as $sdata)
                                                <option value="{{ $sdata->id }}" {{ $sdata->id == $item->tipekamar_id ? 'selected' : '' }}>{{ $sdata->tipe_kamar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="tipekamar">Harga</label>
                                    <div>
                                        <input type="text" class="form-control" value="{{ $item->tipekamar->harga }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="stok">Stok</label>
                                    <input type="number" name="stok" class="form-control" value="{{ $item->stok }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="deskripsi">Deskripsi</label>
                                    <input type="text" name="deskripsi" class="form-control" value="{{ $item->deskripsi }}">
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
