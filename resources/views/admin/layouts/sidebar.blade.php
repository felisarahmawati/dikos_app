<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a>Dikos</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="#">DK</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="dropdown">
        {{-- <a class="nav-link {{('admin.layouts.main') }}" href="{{ route('admin.layouts.main') }}"><i class="fas fa-fire"></i></i><span>Dashboard</span></a> --}}
        <a class="nav-link {{ Route::is('admin.layouts.dashboard') ? 'active' : '' }}" href="{{ route('admin.layouts.dashboard') }}"><i class="fas fa-fire"></i></i><span>Dashboard</span></a>

      </li>
      <li class="menu-header">Menu</li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-home"></i> <span>Landing Page</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ route('home.index') }}">Home</a></li>
          <li><a class="nav-link" href="{{ route('about.index') }}">About</a></li>
          {{-- <li><a class="nav-link" href="">Contact</a></li> --}}
        </ul>
      </li>

      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fa fa-bed"></i> <span>Kamar</span></a>
        <ul class="dropdown-menu">
          {{-- <li><a class="nav-link" href="{{ route('tipekamar.index') }}">Tipe Kamar</a></li>
          <li><a class="nav-link" href="{{ route('kamar.index') }}">Kamar</a></li> --}}
          <li><a class="nav-link" href="{{ route('tipeprodukkamar.index') }}">Tipe Produk</a></li>
          <li><a class="nav-link" href="{{ route('produkkamar.index') }}">Produk</a></li>
        </ul>
      </li>

      <li class="penghuni">
        <a class="nav-link" href="{{ route('penghuni.index') }}"><i class="fa fa-users"></i><span>Daftar Penghuni</span></a>
      </li>

      <li class="pembayaran">
        <a class="nav-link" href="{{ route('pembayaran.index') }}"><i class="fa fa-money-bill"></i><span>Pembayaran</span></a>
      </li>

      <li class="laporan">
        <a class="nav-link" href="{{ route('laporan.index') }}"><i class="far fa-file-alt"></i><span>Laporan</span></a>
      </li>
  </aside>
</div>
