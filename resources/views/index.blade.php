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
            <h5 class="card-title">Selamat Datang, {{ auth()->user()->fullname }}</h5>
            Anda sedang menggunakan aplikasi Sistem Informasi Manajemen Pemeliharaan Lab Komputer (SIMPEL-LAB) SMK N 1 Sragi
        </div>
    </div>
    <section class="section dashboard">

        @can('admin')
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xl-4 col-md-6">
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
                                    <h6>{{ count($labs) }}</h6>
                                    {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                <!-- Customers Card -->
                <div class="col-xl-4 col-md-6">

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
                                    <h6>{{ $users }}</h6>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>


                <!-- Revenue Card -->
                <div class="col-xl-4 col-md-6">
                    <div class="card info-card revenue-card">

                        <div class="filter">
                            <a class="icon" href="/monitoring"><i class="bi bi-arrow-up-right-square"></i> </a>

                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Komputer </h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-pc-display"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $komputer }}</h6>
                                    @if ($pc_rusak > 0)
                                        <a href="/monitoring" class="link text-danger small pt-1 fw-bold">{{ $pc_rusak }}
                                            Komputer</a> <span class="text-muted small pt-2 ps-1">Bermasalah</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->

                <!-- End Customers Card -->
                {{-- tampilan untuk tim mr --}}
            </div>
        @endcan
        @can('maintenanceRepair')


        <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <div class="filter">
                        <a class="icon" href="/komputer"><i class="bi bi-arrow-up-right-square"></i> </a>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Laboratorium </h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-door-open"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ count($labs )}}</h6>
                                {{-- @foreach ($labs as $lab)

                                <span class="text-muted small pt-2 ps-1">{{ $lab->nama_lab }}</span>
                                @endforeach --}}

                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">

                    <div class="filter">
                        <a class="icon" href="/komputer"><i class="bi bi-arrow-up-right-square"></i> </a>

                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Komputer </h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-pc-display"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $komputer }}</h6>
                                @if (count($list_perbaikan) > 0)
                                    <a href="/perbaikan" class="link text-danger small pt-1 fw-bold">{{ count($list_perbaikan) }}
                                        Komputer</a> <span class="text-muted small pt-2 ps-1">Bermasalah</span>
                                @endif
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
                        <h5 class="card-title">Pemeliharaan Hari ini </h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-tools"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ count($sesi) }}</h6>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- End Customers Card -->

        </div>
        <div class="row">

            <!-- Left side columns -->
            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Recent Activity -->
                <div class="card recent-sales overflow-auto">


                    <div class="card-body">
                        <h5 class="card-title">Sesi Pemeliharaan<span> | @carbonNowShort()</span></h5>
                        @if ($sesi->isEmpty())
                            <div>
                                <h5 class=" d-flex justify-content-center align-items-start text-secondary my-5">
                                   Tidak Ada Sesi

                                </h5>
                            </div>
                        @endif
                        <ol class="list-group list-group-numbered">
                            @foreach ($sesi as $list)
                                <a href="pemeliharaan/sesi/{{ $list->id }}/{{ $list->lab_id }}"
                                    class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="ms-2 me-auto">

                                        <div class="fw-bold">@carbon($list->tanggal_mulai) <span class=" fw-normal"> | Lab
                                                {{ $list->lab->nama_lab }}</span></div>
                                        {{ $list->nama_sesi }}
                                        <div>



                                        </div>
                                    </div>

                                    @if (count($list->pemeliharaan) ==
                                            DB::table('pc')->where('lab_id', $list->lab_id)->count() && count($list->pemeliharaan) > 0)
                                        <span class="badge bg-success rounded-pill">
                                            Selesai</span>
                                    @else
                                        <span class="badge bg-primary rounded-pill">
                                            {{ count($list->pemeliharaan) }}

                                            komputer</span>
                                    @endif


                                </a>
                            @endforeach
                        </ol>

                    </div>


                </div><!-- End Recent Activity -->

            </div><!-- End Right side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Daftar Kerusakan Komputer <span>
                                    </span></h5>
                                @if ($list_perbaikan->isEmpty())
                                    <div>
                                        <h5 class=" d-flex justify-content-center align-items-start text-secondary my-5">
                                            Tidak ada Kerusakan
                                        </h5>
                                    </div>
                                @endif
                                <ol class="list-group list-group-numbered">
                                    @foreach ($list_perbaikan as $perbaikan)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">

                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold">
                                                    @carbon_short($perbaikan->tgl_kerusakan) <span class="fw-normal">|
                                                        PC.{{ $perbaikan->pc->no_pc }} di Lab
                                                        {{ $perbaikan->lab->nama_lab }}</span>
                                                    <span
                                                        class="badge {{ $perbaikan->status == 'menunggu perbaikan' ? 'bg-warning text-dark ' : 'bg-primary text-white' }} ">
                                                        {{ $perbaikan->status }}</span>
                                                </div>
                                                {{ $perbaikan->kerusakan }}
                                            </div>
                                            {{-- <span class="badge bg-success rounded-pill">{{ $perbaikan->status }}</span> --}}
                                            <div class="">
                                                <a href="/perbaikan/detail/{{ $perbaikan->id }}"
                                                    class="btn btn-warning btn-sm my-1 "><i class="bi bi-eye"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        data-bs-original-title="Analisa Perbaikan"
                                                        aria-describedby="tooltip24154"></i>
                                                    <span class="d-none d-sm-inline">Analisa Kerusakan</span>
                                                </a>
                                                {{-- <button data-bs-toggle="modal" data-bs-target="#detailModal"
                                                data-id="{{ $perbaikan->id }}" type="button"
                                                class="btn btn-success btn-sm my-1 btn-detail" ><i
                                                    class="bi bi-pencil"  data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Edit Kerusakan" aria-describedby="tooltip24154"></i>
                                            </button> --}}
                                            </div>
                                        </li>
                                    @endforeach


                                </ol>



                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                </div>
            </div><!-- End Left side columns -->



        </div>
        @endcan

        @can('kepala')
        <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-6 col-xl-6">
                <div class="card info-card sales-card">

                    <div class="filter">
                        <a class="icon" href="/monitoring"><i class="bi bi-arrow-up-right-square"></i> </a>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Laboratorium </h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-door-open"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ count($labs )}}</h6>
                                {{-- @foreach ($labs as $lab)

                                <span class="text-muted small pt-2 ps-1">{{ $lab->nama_lab }}</span>
                                @endforeach --}}

                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-6 col-xl-6">
                <div class="card info-card revenue-card">

                    <div class="filter">
                        <a class="icon" href="/monitoring"><i class="bi bi-arrow-up-right-square"></i> </a>

                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Komputer </h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-pc-display"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $komputer }}</h6>
                                @if ($pc_rusak > 0)
                                    <a href="/monitoring" class="link text-danger small pt-1 fw-bold">{{ $pc_rusak }}
                                        Komputer</a> <span class="text-muted small pt-2 ps-1">Bermasalah</span>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->

            <!-- End Customers Card -->

        </div>
        @endcan

    </section>
@endsection
