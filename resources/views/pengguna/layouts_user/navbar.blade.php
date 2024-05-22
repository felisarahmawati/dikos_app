<header id="header" class="header d-flex align-items-center fixed-top" style="background-color: #37517e;">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset ('assets/img/logo_app.png') }} ">
        <h1 class="sitename">Dikos</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('pengguna.layouts_user.content') }}" class="">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="/login">Login</a>

    </div>
</header>
