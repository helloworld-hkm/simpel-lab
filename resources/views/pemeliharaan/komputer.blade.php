@extends('templates.index')
@push('modal-action')
    <div class="modal  fade" id="tambahModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollables modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Pemeliharaan Komputer </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class=" needs-validation" id="form-tambah" method="POST" novalidate>
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-floating mb-3 has-validation">
                                    <input type="text" class="form-control" name="nama_lab" value="{{ $lab->nama_lab }}"
                                        maxlength="255" id="floatingName" placeholder="Your Name" required readonly>
                                    <input type="text" class="form-control" name="lab_id" value="{{ $lab->id }}"
                                        maxlength="255" id="floatingName" placeholder="Your Name" required hidden>
                                    <input type="text" class="form-control" name="sesi_id" value="{{ $sesi->id }}"
                                        maxlength="255" id="floatingName" placeholder="Your Name" required hidden>
                                    <input type="text" class="form-control" name="user_id"
                                        value="{{ auth()->user()->id }}" maxlength="255" id="floatingName"
                                        placeholder="Your Name" required hidden>
                                    <label for="floatingName">Lab</label>
                                    <div class="invalid-feedback">
                                        Lab harus diisi
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3 has-validation">
                                    <input type="text" class="form-control" name="no_pc" value="" id="no_pc"
                                        maxlength="255" id="floatingName" placeholder="Your Name" required readonly>
                                    <input type="text" class="form-control" name="pc_id" value="" id="pc_id"
                                        maxlength="255" placeholder="Your Name" required hidden>

                                    <label for="floatingName">Nomor PC </label>
                                    <div class="invalid-feedback">
                                        No Pc harus diisi
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-3 has-validation">
                            <input type="datetime-local" class="form-control" name="tanggal" value="{{ now() }}"
                                id="tanggal" maxlength="255" id="floatingName" placeholder="Your Name" required>

                            <label for="floatingName">Tanggal </label>
                            <div class="invalid-feedback">
                                tanggal harus diisi
                            </div>
                        </div>
                        <h5 class="card-title">Daftar Pemeliharaan</h5>
                        <ul class="list-group">
                            @foreach ($prosedur as $list)
                                <li class="list-group-item">

                                    <input class="form-check-input me-1" name="todo[]" type="checkbox"
                                        value=" {{ $list->id }}" aria-label="...">
                                    {{ $list->keterangan }}
                                </li>
                            @endforeach

                        </ul>
                        <h5 class="card-title">Hasil</h5>
                        <div class="form-floating mb-3 has-validation">
                            <select class="form-select" name="status" id="status" id="floatingSelect" aria-label="State"
                                required>
                                <option label=" " hidden disabled selected></option>

                                <option value="Tidak Butuh Perbaikan">Tidak Butuh Perbaikan</option>
                                <option value="Butuh Perbaikan">Butuh Perbaikan</option>

                            </select>
                            <label for="floatingSelect">Kondisi PC</label>
                            <div class="invalid-feedback">
                                Silahkan isi Kondisi PC
                            </div>
                        </div>
                        <div class="form-floating mb-3 has-validation" id="kerusakan_input">
                            <input type="text" class="form-control" name="kerusakan" id="kerusakan" maxlength="255"
                                placeholder="Your Name">

                            <label for="floatingName">Kerusakan </label>
                            <div class="invalid-feedback">
                                No Pc harus diisi
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="modal  fade" id="detailModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollables modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pemeliharaan </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class=" needs-validation" id="form-tambah" method="POST" novalidate>
                    <div class="modal-body">
                        <table class="table table-bordered">

                            <tbody>
                                <tr>
                                    <th scope="row" width="50%">Nomor komputer</th>
                                    <td id="detail_noPc"></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="50%">Tempat Alat</th>
                                    <td id="detail_lab"></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="50%">Tanggal Pengecekan</th>
                                    <td id="detail_tanggal"></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="50%">Nama Pelaksana</th>
                                    <td id="detail_pelaksana">Sriwati</td>
                                </tr>
                                <tr>
                                    <td scope="" colspan="2" width="50%">
                                        <p><b>Detail Pemeliharaan</b> </p>
                                        <span>
                                            <ul id="prosedur_list">

                                            </ul>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" width="50%">Kondisi</th>
                                    <td id="detail_kondisi"></td>
                                </tr>
                            </tbody>
                        </table>


                    </div>
                    {{-- <div class="modal-footer">
                        <button class="btn btn-primary">Simpan</button>
                    </div> --}}
                </form>

            </div>
        </div>
    </div>
@endpush
@push('additional-js')
    <script>
        $(document).ready(function() {
            $("#kerusakan_input").hide();
            $("#status").change(function() {
                console.log("cek");
                if ($(this).val() === "Butuh Perbaikan") {
                    $("#kerusakan_input").show();
                } else {
                    $("#kerusakan_input").hide();
                }
            });
            $('body').on('click', '.tambah-data', function(event) {
                event.preventDefault();
                var no_pc = $(this).data('no_pc');
                console.log($(this).data('no_pc'));
                $('#no_pc').val($(this).data('no_pc'));
                $('#pc_id').val($(this).data('pc_id'));

                $('#form-tambah').attr('action', '/pemeliharaan/tambah');
            });
            $('body').on('click', '.btn-detail', function(event) {
                event.preventDefault();
                var id = $(this).data('id');
                $.get('/pemeliharaan/detail/' + id, function(data) {
                    console.log('pemeliharaan:', data);
                    console.log('detail:', data.pemeliharaan.detail);
                    console.log('pc:', data.pemeliharaan.pc);
                    console.log(formatTanggal(data.pemeliharaan.tanggal))
                    $("#detail_noPc").html("Pc." + data.pemeliharaan.pc.no_pc);
                    $("#detail_lab").html("Lab " + data.lab.lab.nama_lab);
                    $("#detail_tanggal").html(formatTanggal(data.pemeliharaan.tanggal));
                    $("#detail_kondisi").html(data.pemeliharaan.perbaikan);
                    $("#detail_pelaksana").html(data.pemeliharaan.user.fullname);
                    var myArray = data.pemeliharaan.detail;
                    var list = $('#prosedur_list');
                    list.empty();
                    $.each(myArray, function(index, item) {
                        var listItem = $('<li>').text(item.keterangan);
                        list.append(listItem);
                    });
                })
            });

        });
    </script>
@endpush()

@section('content')
    <div class="pagetitle">

        <h1>Komputer | {{ $lab->nama_lab }} </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/pemeliharaan">Sesi Pemeliharaan</a></li>
                <li class="breadcrumb-item active"> {{ $lab->nama_lab }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        {{-- alert success untuk tambah data --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <span class="fw-bold">Tambah data berhasil: </span>Hasil Pemeliharaan <span
                    class="text-danger">Pc.{{ session('success') }}</span> berhasil ditambahkan ke Sistem
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            @if ($data->isEmpty() && $data_pemeliharaan->isEmpty())
                <h5 class="text-center my-5">Tidak ada data komputer</h5>
            @endif
            @foreach ($data as $komputer)
                <div class="col-xxl-3 col-md-4">
                    @if ($komputer->pemeliharaan->isEmpty())
                        <div class="card info-card revenue-card }} ">
                        @else
                            @foreach ($komputer->pemeliharaan as $pemeliharaan)
                                <div
                                    class="card info-card {{ $pemeliharaan->perbaikan == 'butuh perbaikan' ? 'customers-card' : 'revenue-card' }} ">
                            @endforeach
                    @endif
                    <a data-bs-target="{{ $komputer->pemeliharaan->isEmpty() ? '#tambahModal' : '' }}"
                        class="tambah-data" data-bs-toggle="modal" data-no_pc="{{ $komputer->no_pc }}"
                        data-pc_id="{{ $komputer->id }}">
                        <div class="card-body">

                            <h5 class="card-title d-flex justify-content-between align-items-center"> <span
                                    class="{{ $komputer->status == 'Normal' ? 'text-primary' : 'text-danger' }} small  fw-bold">{{ $komputer->status }}</span>
                                @if ($komputer->pemeliharaan->isEmpty())
                                    <span class="text-danger small  fw-bold">Belum Diperiksa</span>
                                @else
                                    <span class="text-success small  fw-bold">Selesai</span>
                                @endif
                            </h5>
                            <div class="d-flex align-items-center  ">
                                <div>
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-pc-display-horizontal"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="ps-3">
                                        <h6>No.{{ $komputer->no_pc }}</h6>
                                        @foreach ($komputer->pemeliharaan as $pemeliharaan)
                                            <span
                                                class="{{ $pemeliharaan->perbaikan == 'butuh perbaikan' ? 'text-danger' : 'text-success' }} small  ps-1">{{ $pemeliharaan->perbaikan }}</span>
                                            </h5>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="card-footer d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary btn-sm"><i class="bi bi-info-circle"></i>
                                        Hasil</button>
                                </div> --}}

                    </a>
                </div>
        </div><!-- End Sales Card -->
        @endforeach

        </div>
        @if (!$data_pemeliharaan->isEmpty())
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Hasil Pemeliharaan</h5>

                    <ul class="list-group">

                        @foreach ($data_pemeliharaan as $komputer)
                            @foreach ($komputer->pemeliharaan as $pemeliharaan)
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center fw-bold font-monospace">
                                    <span>
                                        @if ($pemeliharaan->perbaikan == 'tidak butuh perbaikan')
                                            <i class="bi bi-check-circle me-1 text-success"></i>
                                        @else
                                            <i class="bi bi-exclamation-octagon me-1 text-warning"></i>
                                        @endif

                                        Pc.{{ $komputer->no_pc }} | {{ $pemeliharaan->perbaikan }}
                                    </span>
                                    <div class="d-flex flex-sm-column flex-md-row justify-content-end gap-2">
                                        <a href="/pemeliharaan/cetak/{{  $pemeliharaan->id }}/"
                                            class="btn btn-success btn-sm my-1"><i class="bi bi-printer"></i> Cetak
                                        </a>

                                        <button data-bs-toggle="modal" data-bs-target="#detailModal"
                                            data-id="{{ $pemeliharaan->id }}" type="button"
                                            class="btn btn-primary btn-sm my-1 btn-detail"><i
                                                class="bi bi-info-circle"></i>
                                            Detail</button>
                                    </div>
                                </li>
                            @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif



    </section>
@endsection
