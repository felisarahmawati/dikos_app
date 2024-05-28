@extends('pengguna.layouts_user.main')

@section('title')
    {{ trans('Home') }}
@endsection

@section('content')
<main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                    @forelse ($home as $item)
                        <h1>{{ $item->teks1 }}</h1>
                        <p>{{ $item->teks2 }}</p>
                    @empty
                        <h1 class="">Welcome to Dikos</h1>
                        <p class="text-justify">Dikos adalah sebuah platform digital yang dirancang untuk memudahkan proses pencarian dan pemesanan kosan bagi masyarakat yang ingin mencari kosan</p>
                    @endforelse
                    <div class="d-flex">
                        <a href="#about" class="btn-get-started">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 image-home" data-aos="zoom-out" data-aos-delay="100">
                    {{-- <img src="assets/img/image-home.png" class="img-fluid animated" alt=""> --}}
                    @forelse ($home as $item)
                        <img src="{{ Storage::url($item->gambar) }}" alt="{{ $item->id }}"
                        class="img-fluid animated">
                    @empty
                        <img src="assets/img/dikos.png" class="img-fluid animated" alt="">
                    @endforelse
                </div>
            </div>
        </div>
    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2 class="">About Us</h2>
        </div><!-- End Section Title -->
        <div class="container">
            <div class="row gy-4">
                @forelse ($about as $item)
                    <p>{{ $item->teks1 }}</p>
                @empty
                    <p>Selamat datang di Aplikasi Dikos! Di sini, kami tidak hanya membantu Anda menemukan kosan sesuai dengan preferensi lokasi, fasilitas, dan budget Anda, tetapi juga menyediakan pengalaman menyenangkan dan praktis dalam proses pencarian dan pemesanan.</p>
                @endforelse
                <!-- <p></p> -->
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                    @forelse ($about as $item)
                        <img src="{{ Storage::url($item->gambar) }}" alt="img_about" class="img-fluid" />
                    @empty
                        <img src="assets/img/kos.png" alt="img_about" class="img-fluid" />
                    @endforelse
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        @forelse ($about as $item)
                        <h3>Mengapa memilih Aplikasi Dikos?</h3>

                        <ul>
                            <li><i class="bi bi-check2-circle"></i><span>Pencarian yang Mudah: Temukan kosan impian Anda dengan mudah berdasarkan lokasi yang Anda inginkan, fasilitas yang Anda butuhkan, dan budget yang Anda miliki.</span></li>
                            <li><i class="bi bi-check2-circle"></i><span>Informasi Terperinci: Dapatkan informasi yang terperinci mengenai setiap kosan, termasuk foto-foto dan detail harga, sehingga Anda dapat membuat keputusan yang tepat.</span></li>
                            <li><i class="bi bi-check2-circle"></i><span>Proses Pemesanan yang Praktis: Pesan kamar pilihan Anda hanya dalam beberapa langkah mudah, tanpa ribet.</span></li>
                            <li><i class="bi bi-check2-circle"></i><span>Keamanan Pembayaran: Lakukan pembayaran langsung melalui aplikasi dengan aman dan praktis. Kami mengutamakan keamanan transaksi Anda.</span></li>
                            <li><i class="bi bi-check2-circle"></i><span>Komitmen pada Kepuasan Pengguna: Kami berkomitmen untuk memberikan pengalaman terbaik bagi pengguna kami, dari awal hingga akhir. Kepuasan Anda adalah prioritas kami.</span></li>
                        </ul>

                        <p class="text-justify">{{ $item->teks2 }}</p>
                        @empty
                        <h3>Mengapa memilih Aplikasi Dikos?</h3>

                        <ul>
                            <li><i class="bi bi-check2-circle"></i><span>Pencarian yang Mudah: Temukan kosan impian Anda dengan mudah berdasarkan lokasi yang Anda inginkan, fasilitas yang Anda butuhkan, dan budget yang Anda miliki.</span></li>
                            <li><i class="bi bi-check2-circle"></i><span>Informasi Terperinci: Dapatkan informasi yang terperinci mengenai setiap kosan, termasuk foto-foto dan detail harga, sehingga Anda dapat membuat keputusan yang tepat.</span></li>
                            <li><i class="bi bi-check2-circle"></i><span>Proses Pemesanan yang Praktis: Pesan kamar pilihan Anda hanya dalam beberapa langkah mudah, tanpa ribet.</span></li>
                            <li><i class="bi bi-check2-circle"></i><span>Keamanan Pembayaran: Lakukan pembayaran langsung melalui aplikasi dengan aman dan praktis. Kami mengutamakan keamanan transaksi Anda.</span></li>
                            <li><i class="bi bi-check2-circle"></i><span>Komitmen pada Kepuasan Pengguna: Kami berkomitmen untuk memberikan pengalaman terbaik bagi pengguna kami, dari awal hingga akhir. Kepuasan Anda adalah prioritas kami.</span></li>
                        </ul>

                        <p>Jadi, tunggu apa lagi? Ayo bergabung dengan jutaan pengguna lainnya dan temukan pengalaman menyewa kosan yang efisien, praktis, dan menyenangkan dengan Aplikasi Dikos. Booking sekarang dan temukan kamar impian Anda!</p>
                        @endforelse
                        <a href="{{ route('produk.index') }}" class="read-more"><span>Booking Sekarang!</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /About Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <!-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> -->
        </div><!-- End Section Title -->
        <div class="container " data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center gy-4">
                <div class="col-lg-5">
                    <div class="info-wrap">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Address</h3>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>
                        </div><!-- End Info Item -->
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Call Us</h3>
                                <p>+1 5589 55488 55</p>
                            </div>
                        </div><!-- End Info Item -->
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Us</h3>
                                <p>info@example.com</p>
                            </div>
                        </div><!-- End Info Item -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Contact Section -->
</main>
@endsection
