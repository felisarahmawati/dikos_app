@extends('pengguna.layouts_user.main')

@section('title')
    {{ trans('Produk Detail') }}
@endsection

@section('content')
<div class="container pt-5">
    <section id="about" class="about section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Booking Kamar</h2>
        </div>

        <div class="container">
            <div class="row gy-4">
                @forelse ($produk as $item)
                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="text-right">{{ $item->tipeproduk->tipe_produk }}</h3>
                        <img src="{{ Storage::url($item->gambar) }}" alt="{{ $item->id }}" class="img-fluid" />
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <b><p class="text mt-2">Booking yang tersedia: {{ $item->stok }}</p></b>
                        <b><p class="text mt-2">{{ $item->tipeproduk->harga }}/bulan</p></b>
                        <p>{{ $item->deskripsi }}</p>
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
                        @if ($item->stok > 0)
                            <a href="#" class="read-more" data-bs-toggle="modal" data-bs-target="#exampleModalBooking{{ $item->id }}"><span>Booking Sekarang!</span></a>
                        @else
                            <p class="text-danger">Booking penuh!</p>
                        @endif
                    </div>

                    <!-- Modal untuk Produk -->
                    <div class="modal fade" id="exampleModalBooking{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg" style="width: 40%">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel{{ $item->id }}">Format Booking</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('produkdetail.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="produk_id" value="{{ $item->id }}">
                                    <input type="hidden" name="user_id" value="{{ auth()->id() }}"> <!-- Input user_id tersembunyi -->
                                    <div class="modal-body">
                                        <div class="row">
                                            <!-- Input Nama -->
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" class="form-control" id="nama" value="{{ auth()->user()->name }}" readonly>
                                                </div>
                                            </div>
                                            <!-- Input No Hp -->
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="nohp">No Hp</label>
                                                    <input type="number" class="form-control" name="nohp" id="nohp" placeholder="No Hp" value="{{ old('nohp') }}">
                                                    @error('nohp')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Input Alamat -->
                                        <div class="mb-3">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat">{{ old('alamat') }}</textarea>
                                            @error('alamat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Input Jenis Kelamin -->
                                        <div class="mb-3">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-select">
                                                <option selected disabled hidden>Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Input Lama Sewa -->
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="lama_sewa">Lama Sewa (bulan)</label>
                                                    <input type="number" class="form-control" name="lama_sewa" id="lama_sewa" placeholder="Lama Sewa" value="{{ old('lama_sewa') }}">
                                                    @error('lama_sewa')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- Input Uang Masuk (DP) -->
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="dp">Uang Masuk (DP)</label>
                                                    <input type="number" class="form-control" name="dp" id="dp" placeholder="Uang Masuk (DP)" value="{{ old('dp') }}">
                                                    @error('dp')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Input Total Bayar -->
                                        <div class="mb-3">
                                            <label for="total">Total Pembayaran</label>
                                            <input type="number" class="form-control" name="total" id="total" placeholder="Total Pembayaran" value="{{ old('total') }}">
                                            @error('total')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Input KTP -->
                                        <div class="mb-3">
                                            <label for="ktp">KTP</label>
                                            <input type="file" class="form-control" name="ktp" id="ktp">
                                        </div>
                                    </div>
                                    <!-- Tombol simpan dan batal -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="text-right">Kamar A</h3>
                        <img src="{{ asset('assets/img/kamarA.jpg') }}" alt="img_about" class="img-fluid" />
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <b><p class="text mt-2">Rp. 800.000/bulan</p></b>
                        <b><p class="text mt-2">Stok yang tersedia</p></b>
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
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalBookingEmpty"><span>Booking Sekarang!</span></a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</div>
@endsection
