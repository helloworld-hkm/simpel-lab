@extends('templates.index')
@section('content')
    <div class="pagetitle">
        <h1>Pilih Laboratorium</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Lab Komputer</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">

            @foreach ($data as $lab)
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">


                    <a href="/komputer/lab/{{ $lab->id }}">
                    <div class="card-body">
                        <h5 class="card-title">Laboratorium </h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-door-open"></i>
                            </div>
                            <div class="ps-3">
                                <h6>  {{ $lab->nama_lab }}</h6>
                                <span class="text-success small pt-1 fw-bold">{{ count($lab->komputer) }}</span> <span class="text-muted small pt-2 ps-1">komputer</span>

                            </div>
                        </div>
                    </div>
                    </a>

                </div>
            </div><!-- End Sales Card -->
            @endforeach

        </div>
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Laboratorium Komputer</span></h5>

                                <ul class="list-group">
                                    @foreach ($data as $lab)

                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                       <a href="/komputer/lab/{{ $lab->id }}">{{ $lab->nama_lab }}</a>


                                       <span class="badge bg-primary rounded-pill">
                                        if()
                                        {{ count($lab->komputer) }}
                                        Komputer</span>


                                      </li>
                                    @endforeach


                                  </ul>



                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>
@endsection
