@extends('templates.index')
@section('content')
    <div class="pagetitle">
        <h1>Sesi Pemeliharaan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Sesi Pemeliharaan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        @if (session()->has('update_spek'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <span class="fw-bold">Pembaruan data berhasil: </span></span>Data PC.<span
                    class="text-danger">{{ session('update_spek') }}</span> berhasil diperbarui
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <span class="fw-bold">Tambah data berhasil: </span>Sesi <span
                    class="text-danger">{{ session('success') }}</span> berhasil ditambahkan ke Sistem
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">

            <!-- Left side columns -->
            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Recent Activity -->
                <div class="card">


                    <div class="card-body">
                        <h5 class="card-title">Tambah Sesi</h5>
                        <form class=" needs-validation" action="/pemeliharaan" method="POST" novalidate>
                            @csrf
                            <div class="form-floating mb-3 has-validation">
                                <input type="date" class="form-control" name="tanggal_mulai" maxlength="255"
                                    id="floatingName" placeholder="Your Name" required>

                                <label for="floatingName">Tanggal Sesi </label>
                                <div class="invalid-feedback">
                                    Tanggal harus diisi
                                </div>
                            </div>
                            <div class="form-floating mb-3 has-validation">
                                <input type="text" class="form-control" name="nama_sesi" maxlength="255"
                                    id="floatingName" placeholder="Your Name" required>

                                <label for="floatingName">Nama Sesi </label>
                                <div class="invalid-feedback">
                                    Nama Sesi harus diisi
                                </div>
                            </div>
                            <div class="form-floating mb-3 has-validation">
                                <select class="form-select" name="lab_id" id="floatingSelect" aria-label="State" required>
                                    <option label=" " hidden disabled selected></option>
                                    @foreach ($lab as $l)
                                        <option value="{{ $l->id }}">{{ $l->nama_lab }}</option>
                                    @endforeach


                                </select>
                                <label for="floatingSelect">Lab Komputer</label>
                                <div class="invalid-feedback">
                                    Silahkan isi Lokasi Pemeliharaan
                                </div>
                            </div>


                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button class="btn btn-primary ml-auto">Simpan</button>
                    </div>
                    </form>
                </div><!-- End Recent Activity -->

            </div><!-- End Right side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Daftar Sesi Pemeliharaan <span>| {{ auth()->user()->role->role }}
                                    </span></h5>
                                @if ($sesi->isEmpty())
                                    <div>
                                        <h5 class=" d-flex justify-content-center align-items-start text-secondary my-5">
                                            Data Sesi Belum ada
                                        </h5>
                                    </div>
                                @endif
                                <ol class="list-group list-group-numbered">
                                    @foreach ($sesi as $list)
                                        <a href="pemeliharaan/sesi/{{ $list->id }}/{{ $list->lab_id }}" class="list-group-item d-flex justify-content-between align-items-center">
                                            <div class="ms-2 me-auto">

                                                <div class="fw-bold">@carbon($list->tanggal_mulai)   <span class=" fw-normal"> | Lab {{ $list->lab->nama_lab }}</span></div>
                                                {{ $list->nama_sesi }}
                                            </div>
                                            {{-- {{ count ($sesi->lab) }}
                                            @if (count($list->pemeliharaan)==count($sesi))
                                            <span class="badge bg-success rounded-pill">
                                             Selesai</span>
                                            @else --}}
                                            <span class="badge bg-primary rounded-pill">
                                                {{ count($list->pemeliharaan) }}

                                               komputer Selesai</span>
                                            {{-- @endif --}}


                                        </a>
                                    @endforeach

                                </ol>



                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                </div>
            </div><!-- End Left side columns -->



        </div>
    @endsection
