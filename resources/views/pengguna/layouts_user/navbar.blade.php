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

        <ul class="nav-item dropdown">
            @auth
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false" style="color: #fff;">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('history.index') }}">
                        Riwayat Pemesanan</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        @if (Auth::user()->level == 'penghuni' || Auth::user()->level == '1')
                        <form action="{{ url('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </button>
                        </form>
                        @elseif (Auth::user()->level == 'admin' || Auth::user()->level == '0')
                        <form action="{{ url('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </button>
                        </form>
                        @endif
                    </li>
                </ul>
            @else
                <a class="btn-getstarted" href="{{ route('login') }}">Login</a> <!-- Tambahkan kelas "login-link" -->
            @endauth
        </ul>
    </div>
</header>
