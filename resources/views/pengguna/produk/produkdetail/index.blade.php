@extends('pengguna.layouts_user.main')

@section('title')
    {{ trans('Produk Detail') }}
@endsection

@section('content')
<div class="container pt-5">
    <section id="about" class="about section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Detail Kamar </h2>
        </div><!-- End Section Title -->
        <div class="container">
            <div class="row gy-4">
                <!-- First Row -->
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-right">Kamar A</h3>
                    <img src="{{ asset('assets/img/kamarA.jpg') }}" alt="img_about" class="img-fluid" />
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <b><p class="text mt-2">Rp. 800.000/bulan</p></b>
                    <p>Kost ini terdiri dari 2 lantai. Untuk Tipe kamar A berada di lantai 1 dengan jendela menghadap ke arah luar. Adapun fasilitas yang akan di dapat:</p>
                    <b><p class="text mt-2">Fasilitas Kamar</p></b>
                    <div class="facilities">
                        <ul>
                            <li><i class="bi bi-dash"></i><span>Kasur</span></li>
                            <li><i class="bi bi-dash"></i><span>Lemari Baju</span></li>
                            <li><i class="bi bi-dash"></i><span>Meja</span></li>
                        </ul>
                        <ul>
                            <li><i class="bi bi-dash"></i><span>Bantal</span></li>
                            <li><i class="bi bi-dash"></i><span>Kipas Angin</span></li>
                        </ul>
                    </div>
                    <b><p class="text mt-2">Fasilitas Kamar Mandi</p></b>
                    <div class="facilities">
                        <ul>
                            <li><i class="bi bi-dash"></i><span>Kloset Duduk</span></li>
                            <li><i class="bi bi-dash"></i><span>Shower</span></li>
                            <li><i class="bi bi-dash"></i><span>Ember dan Gayung</span></li>
                        </ul>
                    </div>
                    <a href="#" class="read-more" data-bs-toggle="modal" data-bs-target="#exampleModalBooking"><span>Booking Sekarang!</span></a>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- Modal Tambah --}}
    <div class="modal fade" id="exampleModalBooking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header hader">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Format Booking
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">

                        <!-- Input Nama -->
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                placeholder="Nama" @error('nama') is-invalid @enderror
                                value="{{ old('nama') }}">
                            @error('nama')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Input No Hp -->
                        <div class="form-group">
                            <label for="nohp">No Hp</label>
                            <input type="number" class="form-control" name="nohp" id="nohp"
                                placeholder="No Hp" @error('nohp') is-invalid @enderror
                                value="{{ old('nohp') }}">
                            @error('nohp')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Input Alamat -->
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" aria-label="With textarea" name="alamat" id="alamat" placeholder="Alamat" @error('alamat') is-invalid @enderror>{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Input Jenis Kelamin -->
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-select"  placeholder="Jenis Kelamin" @error('jenis_kelamin') is-invalid @enderror
                                value="{{ old('alamat') }}">
                                <option selected>Jenis Kelamin</option>
                                <option value="1">Laki-laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Input Lama Sewa -->
                        <div class="form-group">
                            <label for="lama_sewa">Lama Sewa</label>
                            <input type="text" class="form-control" name="lama_sewa" id="lama_sewa"
                                placeholder="Lama_sewa" @error('lama_sewa') is-invalid @enderror
                                value="{{ old('lama_sewa') }}">
                            @error('lama_sewa')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Input Uang Masuk (DP) -->
                        <div class="form-group">
                            <label for="dp">Uang Masuk (DP) </label>
                            <input type="text" class="form-control" name="dp" id="dp"
                                placeholder="Uang Masuk (DP)" @error('dp') is-invalid @enderror
                                value="{{ old('dp') }}">
                            @error('dp')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Input Total Bayar -->
                        <div class="form-group">
                            <label for="total">Total Pembayaran</label>
                            <input type="text" class="form-control" name="total" id="total"
                                placeholder="Total Pembayaran" @error('total') is-invalid @enderror
                                value="{{ old('total') }}">
                            @error('dp')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Input Ktp -->
                        <div class="form-group">
                            <label for="image"> KTP </label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                    </div>
                    <!-- Tombol simpan dan batal -->
                    <div class="modal-footer d-md-block">
                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                        <button type="button" class="btn btn-danger btn-sm">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
