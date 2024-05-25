<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
            </li>
            <li>
                <a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a>
            </li>
        </ul>
        <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
            <div class="search-backdrop"></div>
                <div class="search-result">
                    <div class="search-header">
                        Histories
                    </div>
                </div>
        </div>
    </form>
    {{-- <ul class="navbar-nav navbar-right">
        <li class="navbar dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset ('assets_admin/img/avatar/avatar-1.png') }} " class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">
                Hi, Ujang Maman
            </div>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="features-profile.html" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i>Logout
                </a>
            </div>
        </li>
    </ul> --}}
    <ul class="nav-item dropdown">
        @auth
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false" style="color: #fff;">
                {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">
                    Profile</a>
                </li>
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
</nav>
