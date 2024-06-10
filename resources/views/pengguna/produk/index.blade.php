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
            <div class="row gy-4 mt-2">
                @forelse ($produk as $item)
                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="text-right">{{ $item->tipeproduk->tipe_produk }}</h3>
                        <img src="{{ Storage::url($item->gambar) }}" alt="{{ $item->id }}" class="img-fluid">
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <b><p class="text mt-5">{{ $item->tipeproduk->harga }}/bulan</p></b>
                        <p class="text-justify">{!! html_entity_decode($item->deskripsi) !!}</p>
                        <a href="{{ route('produkdetail.index') }}" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                @empty
                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="text-right">Tipe Kamar A</h3>
                        <img src="{{ asset('assets/img/kamarA.jpg') }}" alt="img_about" class="img-fluid" />
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <b><p class="text mt-5">Rp. 800.000/bulan</p></b>
                        <p class="text-justify">Kost ini terdiri dari 2 lantai. Untuk Tipe kamar A berada di lantai 1 dengan jendela menghadap ke arah luar. Adapun fasilitas yang akan di dapat:</p>
                        <a href="{{ route('produkdetail.index') }}" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                @endforelse
            </div>
        </div>

    </section>
</div>
@endsection
