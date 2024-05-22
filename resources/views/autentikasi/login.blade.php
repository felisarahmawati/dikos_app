@extends('pengguna.layouts_user.main')

@section('title')
    {{ trans('Home') }}
@endsection

@section('content')
<div class="container" style="margin-top: 110px;">
    <div class="row justify-content-center">
        <div class="col-md-6 mb-4">
            <div class="card shadow mx-auto" style="max-width: 400px;"> <!-- Menambahkan max-width -->
                <div class="card-body">
                    <div class="text-center">
                        <img src="assets/img/logo_app.png" alt="logo" width="100" class="mb-3">
                        <h4 class="mb-4">Login</h4>
                    </div>

                    <form method="POST" action="#" class="needs-validation" novalidate="">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="email"
                                placeholder="Masukkan Email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control"
                                id="password" autocomplete="current-password"
                                placeholder="Password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <div class="input-group">
                                <a href="auth-forgot-password.html" class="btn btn-link">Forgot Password?</a>
                            </div>
                        </div>

                        <div class="form-group mb-4 text-center"> <!-- Mengubah posisi button login menjadi di tengah -->
                            <button type="submit" class="btn btn-primary btn-sm px-4" tabindex="4"> <!-- Menambahkan kelas btn-sm untuk mengurangi ukuran tombol -->
                                Login
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <div class="mt-3 text-center">
                Belum punya akun? <a href="auth-register.html">Buat Akun</a>
            </div>
        </div>
    </div>
</div>
@endsection
