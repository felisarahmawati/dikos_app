@foreach ($tipeproduk as $item)
    <div class="modal fade" id="exampleModalEdit{{ $item->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width: 40%">
            <div class="modal-content">
                <div class="modal-header hader">
                    <h6 class="modal-title" id="exampleModalLabel{{ $item->id }}">
                        Edit Tipe Produk
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tipeprodukkamar.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label>Tipe Produk</label>
                                    <input type="tipe_produk" name="tipe_produk"
                                        class="form-control @error('tipe_produk') is-invalid @enderror"
                                        value="{{ $item->tipe_produk}}" aria-describedby="basic-addon1" required>
                                    @error('tipe_produk')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label>Harga</label>
                                    <input type="harga" name="harga"
                                        class="form-control @error('harga') is-invalid @enderror"
                                        value="{{ $item->harga}}" aria-describedby="basic-addon1" required>
                                    @error('harga')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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
