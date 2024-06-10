@foreach ($produk as $item)
    <div class="modal fade" id="exampleModalEdit{{ $item->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width: 40%">
            <div class="modal-content">
                <div class="modal-header hader">
                    <h6 class="modal-title" id="exampleModalLabel{{ $item->id }}">
                        Edit Data produk
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('produkkamar.update', $item->id) }}" method="POST" enctype="multipart/form-data">
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
                                    <label class="tipeproduk">Tipe Produk</label>
                                    <div>
                                        <select class="form-select" name="tipeproduk_id" id="tipeproduk_id" style="width: 100%">
                                            <option value="">-- Pilih --</option>
                                            @foreach ($tipeproduk as $sdata)
                                                <option value="{{ $sdata->id }}" {{ $sdata->id == $item->tipeproduk_id ? 'selected' : '' }}>{{ $sdata->tipe_produk }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="tipeproduk">Harga</label>
                                    <div>
                                        <input type="text" class="form-control" value="{{ $item->tipeproduk->harga }}" readonly>
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
                                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" value="{{ $item->deskripsi }}">{{ $item->deskripsi }}</textarea>
                                </div>
                            </div>
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
@push('page-scripts')
<script src="{{ asset('assets_admin/ckeditor/ckeditor.js') }}"></script>
<script>
        $(function() {
            CKEDITOR.replace('deskripsi')
            console.log("ADA");
        })
</script>
@endpush