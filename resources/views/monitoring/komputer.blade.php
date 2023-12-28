@extends('templates.index')
@section('content')
<div class="pagetitle">
    <h1>Laboratorium | <span>{{ $lab->nama_lab }}</span></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/monitoring">Monitoring</a></li>

            <li class="breadcrumb-item active">Laboratorium</li>
            <li class="breadcrumb-item active">{{ $lab->nama_lab }}</li>

        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">



    <div class="row">
        @if ($data->isEmpty())
            <h5 class="text-center">data Komputer kosong</h5>
        @endif
        @foreach ($data as $komputer)
            <div class="col-xxl-3 col-md-4">

                <div class="card info-card {{ $komputer->status == 'Rusak' ? 'customers-card' : 'revenue-card' }}">

                    <a href="/monitoring/komputer/detail/{{ $komputer->id }}/{{ $lab->id }}">
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-content-between align-items-center"> <span
                                    class="{{ $komputer->status == 'Normal' ? 'text-primary' : 'text-danger' }} small  fw-bold">{{ $komputer->status == 'Rusak' ? 'Butuh Perbaikan' : $komputer->status }}</span>
                                @if ($komputer->pemeliharaan->isEmpty())
                                    <span class="text-muted small ">Belum Pernah Dicek</span>
                            </h5>
                        @else
                            <span class="text-muted small  ps-1">Pengecekan: @carbon_short($komputer->pemeliharaan->first()->tanggal)</span> </h5>
                            {{-- @foreach ($komputer->pemeliharaan as $pemeliharaan) --}}
                            {{-- @endforeach --}}
        @endif

        <div class="d-flex align-items-center  ">
            <div>
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-pc-display-horizontal"></i>
                </div>
            </div>
            <div>
                <div class="ps-3">
                    <h6>No.{{ $komputer->no_pc }}</h6>
                    {{-- <span class="text-success small pt-1 fw-bold">Sudah dicek</span> --}}
                </div>
            </div>
        </div>
    </div>
    </a>
    </div>
    </div><!-- End Sales Card -->
    @endforeach

    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Asset Lab</h5>

              <!-- List group With badges -->
              <ul class="list-group">
                @if ($dataAsset->isEmpty())
                <h5 class="text-center">data Aset kosong</h5>
            @endif

                @foreach ($dataAsset as $asset)

                <li class="list-group-item d-flex justify-content-between align-items-center">
                  {{ $asset->aset }}
                  <span class="badge bg-primary rounded-pill"> {{ $asset->kondisi }}</span>
                </li>
                @endforeach

              </ul><!-- End List With badges -->

            </div>
          </div>
    </div>

</section>
@endsection
