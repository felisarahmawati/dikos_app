<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ ('Dikos') }} - @yield('title')</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('assets_admin/img/logo_app.png')}}"/>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('assets_admin/modules/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_admin/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_admin/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">



  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets_admin/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_admin/css/components.css') }}">

    <!-- @stack('page-styles') -->
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-94034622-3');
    </script>

</head>

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      @include('admin.layouts.header')
      @include('admin.layouts.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')




      </div>
      <footer class="main-footer">
            @include('admin.layouts.footer')
        </footer>
    </div>
  </div>


  <!-- @stack('before-scripts') -->
  <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('assets_admin/js/stisla.js' )}}"></script>
  <script src="{{ asset('assets_admin/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('assets_admin/modules/popper.js') }}"></script>
  <script src="{{ asset('assets_admin/modules/tooltip.js') }}"></script>
  <script src="{{ asset('assets_admin/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets_admin/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets_admin/modules/moment.min.js') }}"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('assets_admin/modules/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset('assets_admin/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets_admin/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
  <script src="{{ asset('assets_admin/modules/jquery-ui/jquery-ui.min.js') }}"></script>


  <!-- Template JS File -->
  <script src="{{ asset('assets_admin/js/scripts.js') }}"></script>
  <script src="{{ asset('assets_admin/js/custom.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>


  @stack('page-scripts')
</body>
</html>
