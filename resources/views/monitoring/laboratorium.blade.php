@extends('templates.index')
@section('content')
<div class="pagetitle">
    <h1>Data Laboratorium</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item ">Monitoring</li>
            <li class="breadcrumb-item active">Laboratorium</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">



    <div class="row">

        @foreach ($data as $lab)
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">


                <a href="/monitoring/komputer/{{ $lab->id }}">
                <div class="card-body">
                    <h5 class="card-title">Laboratorium </h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-door-open"></i>
                        </div>
                        <div class="ps-3">
                            <h6>  {{ $lab->nama_lab }}</h6>
                            @foreach ($lab->komputer as $komputer)
                            @if ($komputer->status === 'rusak')
                                @php
                                    $rusakCount++; // Increment the count for each damaged computer
                                @endphp
                            @endif
                        @endforeach
                            <span class="text-success small pt-1 fw-bold">{{ count($lab->komputer) }}</span> <span class="text-muted small pt-2 ps-1">komputer</span>

                        </div>
                    </div>
                </div>
                </a>

            </div>
        </div><!-- End Sales Card -->
        @endforeach

    </div>

</section>
@endsection
