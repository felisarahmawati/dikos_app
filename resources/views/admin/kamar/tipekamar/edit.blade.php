@foreach ($tipekamar as $item)
    <div class="modal fade" id="exampleModalEdit{{ $item->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width: 40%">
            <div class="modal-content">
                <div class="modal-header hader">
                    <h6 class="modal-title" id="exampleModalLabel{{ $item->id }}">
                        Edit Tipe Kamar
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tipekamar.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label for="gambar"> Gambar </label>
                                    <br><br>
                                    <img src="{{ Storage::url($item->gambar) }}" class="rounded shadow-sm"
                                        style="width: 35%;"><br><br>
                                    <input type="file" class="form-control" name="gambar" id="gambar">
                                </div>
                            </div><!-- Col -->
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label>Tipe Kamar</label>
                                    <input type="tipe_kamar" name="tipe_kamar"
                                        class="form-control @error('tipe_kamar') is-invalid @enderror"
                                        value="{{ $item->tipe_kamar}}" aria-describedby="basic-addon1" required>
                                    @error('tipe_kamar')
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
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label>Deskripsi</label>
                                    <input type="deskripsi" name="deskripsi"
                                        class="form-control @error('deskripsi') is-invalid @enderror"
                                        value="{{ $item->deskripsi}}" aria-describedby="basic-addon1" required>
                                    @error('deskripsi')
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
