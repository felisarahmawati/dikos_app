@extends('pengguna.layouts_user.main')

@section('title')
    {{ trans('Produk') }}
@endsection

@section('content')
<div class="container pt-5">
    <section id="about" class="about section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Tipe Kamar</h2>
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
                    <ul>
                        <li><i class="bi bi-check2-circle"></i> <span>Fasilitas Kamar</span></li>
                        <li><i class="bi bi-check2-circle"></i> <span>Fasilitas Kamar Mandi</span></li>
                    </ul>
                    <a href="{{ route('pengguna.produk.produkdetail.index') }}" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <div class="row gy-4 mt-4">
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-right">Kamar B</h3>
                    <img src="{{ asset('assets/img/kamarB.jpg') }}" alt="img_about" class="img-fluid" />
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <b><p class="text mt-2">Rp. 900.000/bulan</p></b>
                    <p>Kost ini terdiri dari 2 lantai. Untuk Tipe kamar B berada di lantai 2 dengan jendela menghadap ke arah luar. Adapun fasilitas yang akan di dapat:</p>
                    <ul>
                        <li><i class="bi bi-check2-circle"></i> <span>Fasilitas Kamar</span></li>
                        <li><i class="bi bi-check2-circle"></i> <span>Fasilitas Kamar Mandi</span></li>
                    </ul>
                    <a href="{{ route('pengguna.produk.produkdetail.index') }}" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
