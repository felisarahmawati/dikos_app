@extends('admin.layouts.main')

@section('title')
    {{ trans('Dashboard') }}
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3>Selamat datang di halaman, Admin Kosan!</h3>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-secondary"><i class="fa fa-bed"></i></div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Jumlah Kamar</h4>
                    </div>
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-secondary"><i class="fa fa-users"></i></div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Daftar Penghuni</h4>
                    </div>
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-secondary"><i class="far fa-file"></i></div>
                <div class="card-wrap">
                    <div class="card-header"><h4>Laporan</h4></div>
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
