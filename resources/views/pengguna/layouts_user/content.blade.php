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
                    <h1 class="">Welcome to Dikos</h1>
                    <p class="text-justify">Dikos adalah sebuah platform digital yang dirancang untuk memudahkan proses pencarian dan pemesanan kosan bagi masyarakat yang ingin mencari kosan</p>
                    <div class="d-flex">
                        <a href="#about" class="btn-get-started">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 image-home" data-aos="zoom-out" data-aos-delay="100">
                    <img src="{{ asset('assets/img/dikos.png') }} " class="img-fluid animated" alt="">
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
                <!-- <p></p> -->
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset ('assets/img/kos.png') }}" alt="img_about" class="img-fluid" />
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <p class="text-justify">Dengan Aplikasi Dikos, Anda dapat mencari kosan berdasarkan lokasi preferensi Anda, fasilitas yang Anda butuhkan, serta budget yang Anda miliki. Di sini, kami menyediakan informasi yang terperinci mengenai setiap kosan, termasuk foto-foto, dan detail harga.
                        Selain mencari kosan, kami juga memberikan kemudahan dalam proses pemesanan. Anda dapat memesan kamar pilihan Anda dengan mudah dan aman hanya dalam beberapa langkah. Setelah itu, Anda dapat melakukan pembayaran langsung melalui aplikasi, yang tidak hanya praktis, tetapi juga terjamin keamanannya.
                        Dengan Aplikasi Dikos, proses mencari dan menyewa kosan menjadi lebih efisien, praktis, dan menyenangkan. Kami berkomitmen untuk memberikan pengalaman terbaik bagi pengguna kami. Jadi, tunggu apalagi? Ayo booking sekarang dan temukan kamar yang ada inginkan!</p>
                        <a href="{{ route('pengguna.produk.index') }}" class="read-more"><span>Booking Sekarang!</span><i class="bi bi-arrow-right"></i></a>
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
