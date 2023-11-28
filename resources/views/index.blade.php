@extends('templates.index')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard | {{ auth()->user()->role->role }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Selamat Datang, {{auth()->user()->fullname}}</h5>
            Anda sedang menggunakan aplikasi Sistem Informasi Manajemen Pemeliharaan Lab Komputer (SIMPEL-LAB) SMK N 1 Sragi
        </div>
    </div>
    <section class="section dashboard">


        <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-6 col-xl-6">
                <div class="card info-card sales-card">

                    <div class="filter">
                        <a class="icon" href="lab"><i class="bi bi-arrow-up-right-square"></i> </a>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Laboratorium </h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-door-open"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $labs }}</h6>
                                {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Sales Card -->
            <!-- Customers Card -->
            <div class="col-xxl-6 col-xl-6">

                <div class="card info-card customers-card">

                    <div class="filter">
                        <a class="icon" href="pengguna"><i class="bi bi-arrow-up-right-square"></i> </a>

                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Pengguna </h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $users}}</h6>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- End Customers Card -->

        </div>
        <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <div class="filter">
                        <a class="icon" href="lab"><i class="bi bi-arrow-up-right-square"></i> </a>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Laboratorium </h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-door-open"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $labs }}</h6>
                                {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">

                    <div class="filter">
                        <a class="icon" href="#"><i class="bi bi-arrow-up-right-square"></i> </a>

                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Komputer </h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-pc-display"></i>
                            </div>
                            <div class="ps-3">
                                <h6>1244</h6>

                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">

                    <div class="filter">
                        <a class="icon" href="pengguna"><i class="bi bi-arrow-up-right-square"></i> </a>

                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Pengguna </h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $users}}</h6>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- End Customers Card -->

        </div>

    </section>
@endsection
