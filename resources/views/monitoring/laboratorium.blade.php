@extends('templates.index')
@section('content')
<div class="pagetitle">
    <h1>Data Laboratorium</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item ">Monitoring</li>
            <li class="breadcrumb-item active">Laboratorium</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">



    <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">



                <div class="card-body">
                    <h5 class="card-title">Laboratorium </h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-door-open"></i>
                        </div>
                        <div class="ps-3">
                            <h6>Akuntansi</h6>
                            <span class="text-success small pt-1 fw-bold">40</span> <span class="text-muted small pt-2 ps-1">komputer</span>

                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sales Card -->

        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">



                <div class="card-body">
                    <h5 class="card-title">Laboratorium </h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-door-open"></i>
                        </div>
                        <div class="ps-3">
                            <h6>TKJ 1</h6>
                            <span class="text-success small pt-1 fw-bold">40</span> <span class="text-muted small pt-2 ps-1">komputer</span>

                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sales Card -->
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">



                <div class="card-body">
                    <h5 class="card-title">Laboratorium </h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-door-open"></i>
                        </div>
                        <div class="ps-3">
                            <h6>Akuntansi</h6>
                            <span class="text-success small pt-1 fw-bold">40</span> <span class="text-muted small pt-2 ps-1">komputer</span>

                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sales Card -->

    </div>

</section>
@endsection
