<div class="modal fade" id="exampleModalEdit" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 40%">
        <div class="modal-content">
            <div class="modal-header hader">
                <h5 class="modal-title" id="exampleModalLabel">
                    Edit Landing Page About
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="image_new"> Gambar </label>
                        <br><br>
                        <img src="" class="rounded shadow-sm"
                            style="width: 35%;"><br><br>
                        <input type="file" class="form-control" name="image" id="image_new">
                    </div>
                    <div class="form-group">
                        <label for="teks1">Teks 1</label>
                        <input type="text" class="form-control" name="teks1" id="teks1"
                            value="">
                    </div>
                    <div class="form-group">
                        <label for="teks2">Teks 1</label>
                        <input class="form-control" name="teks2" id="teks2" rows="3" value="">
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
