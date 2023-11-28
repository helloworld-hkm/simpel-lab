@extends('templates.index')
@section('content')
    <div class="pagetitle">

        <h1>Detail Pengguna</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item "><a href="/pengguna">Pengguna</a></li>
                <li class="breadcrumb-item active">Detail</li>

            </ol>
        </nav>

        <div id="section" class="section">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Overview</h5>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                        <div class="col-lg-9 col-md-8">:{{ $detail->fullname }}</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label ">username</div>
                        <div class="col-lg-9 col-md-8">: {{ $detail->username }}</div>
                    </div>


                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Posisi</div>
                        <div class="col-lg-9 col-md-8">: {{ $detail->role->role }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Telepon</div>
                        <div class="col-lg-9 col-md-8">: {{ $detail->phone }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Alamat</div>
                        <div class="col-lg-9 col-md-8">: {{ $detail->address }}</div>
                    </div>

                </div>
                <div class="card-footer">
                    <a href="/pengguna" class="btn btn-primary"> <i class="bi bi-arrow-left-circle"></i></a>
                </div>
            </div>
        </div>


    </div><!-- End Page Title -->
@endsection
