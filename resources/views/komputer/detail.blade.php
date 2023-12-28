@extends('templates.index')
@push('modal-action')
    <div class="modal  fade" id="updatehardwareModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollables ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Data Spesifikasi Pc | Hardware</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class=" needs-validation" action="/komputer/updateHardware/{{ $data->id }}/{{ $data->lab->id }}"
                    method="POST" novalidate>
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            @foreach ($unlink_hw as $ls_hardware)
                                <div class="col-lg-12">
                                    <div class="form-floating mb-3 has-validation ">
                                        <input type="text" class="form-control"
                                            name="hardware[{{ $ls_hardware->id }}][keterangan]" maxlength="255"
                                            id="floatingName" placeholder="Your Name" required>

                                        <label for="floatingName">{{ $ls_hardware->hardware }} </label>
                                        <div class="invalid-feedback">
                                            {{ $ls_hardware->hardware }} harus diisi
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>


                    <div class="modal-footer">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="modal  fade" id="updatesoftwareModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollables ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Data Spesifikasi Pc | Software </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class=" needs-validation" action="/komputer/updateSoftware/{{ $data->id }}/{{ $data->lab->id }}"
                    method="POST" novalidate>
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            @foreach ($unlink_sw as $ls_software)
                                <div class="col-lg-12">
                                    <div class="form-floating mb-3 has-validation ">
                                        <input type="text" class="form-control"
                                            name="software[{{ $ls_software->id }}][keterangan]" maxlength="255"
                                            id="floatingName" placeholder="Your Name" required>

                                        <label for="floatingName">{{ $ls_software->software }} </label>
                                        <div class="invalid-feedback">
                                            {{ $ls_software->software }} harus diisi
                                        </div>
                                    </div>
                                </div>
                            @endforeach

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
    <div class="modal  fade" id="detailPenggantianHardwareModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollables modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Penggantian Hardware </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class=" needs-validation" id="form-tambah" method="POST" novalidate>
                    <div class="modal-body">
                        <table class="table table-bordered">

                            <tbody>
                                <tr>
                                    <th scope="row" width="50%">Hardware</th>
                                    <td id="hardware"></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="50%">Tanggal Penggantian</th>
                                    <td id="tanggal_penggantian"></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="50%">Hardware Lama</th>
                                    <td id="hardware_lama"></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="50%">Hardware Baru</th>
                                    <td id="hardware_baru"></td>
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
    <div class="modal  fade" id="detailPenggantianSoftwareModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollables modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Penggantian Software</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class=" needs-validation" id="form-tambah" method="POST" novalidate>
                    <div class="modal-body">
                        <table class="table table-bordered">

                            <tbody>
                                <tr>
                                    <th scope="row" width="50%">Software</th>
                                    <td id="software"></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="50%">Tanggal Penggantian</th>
                                    <td id="tanggal_penggantian_software"></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="50%">Software Lama</th>
                                    <td id="software_lama"></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="50%">Software Baru</th>
                                    <td id="software_baru"></td>
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
    <div class="modal  fade" id="detailPerbaikanModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollables modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Perbaikan </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class=" needs-validation" id="form-tambah" method="POST" novalidate>
                    <div class="modal-body">
                        <table class="table table-bordered">

                            <tbody>
                                <tr>
                                    <th scope="row" width="50%">Nomor komputer</th>
                                    <td id="detailPerbaikan_noPc"></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="50%">Tempat Alat</th>
                                    <td id="detailPerbaikan_lab"></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="50%">Tanggal Kerusakan</th>
                                    <td id="detailPerbaikan_tanggal">-</td>
                                </tr>
                                <tr>
                                    <th scope="row" width="50%">Tanggal Selesai</th>
                                    <td id="detail_selesai"></td>
                                </tr>

                                <tr>
                                    <td scope="" colspan="2" width="50%">
                                        <p><b>Kerusakan</b> </p>
                                        <span>
                                            <ul id="ket">
                                                -
                                            </ul>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="" colspan="2" width="50%">
                                        <p><b>Detail Perbaikan</b> </p>
                                        <span>
                                            <ul id="detail_perbaikan">
                                                -
                                            </ul>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" width="50%">Keterangan</th>
                                    <td id="keterangan">-</td>
                                </tr>
                                <tr>
                                    <th scope="row" width="50%">Status</th>
                                    <td id="status"></td>
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
                    $("#detail_noPc").html("Pc." + data.pemeliharaan.pc.no_pc);
                    $("#detail_lab").html("Lab " + data.lab.lab.nama_lab);
                    $("#detail_tanggal").html( formatTanggal(data.pemeliharaan.tanggal));
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
            $('body').on('click', '.btn-detail-perbaikan', function(event) {
                event.preventDefault();
                var id = $(this).data('id');
                $.get('/perbaikan/detailPerbaikan/' + id, function(data) {

                    // console.log('detail:', data.pemeliharaan.detail);
                    // console.log('pc:', data.pemeliharaan.pc);
                    $("#detailPerbaikan_noPc").html("PC." + data.perbaikan.pc.no_pc);
                    $("#detailPerbaikan_lab").html("Lab " + data.perbaikan.lab.nama_lab);
                    $("#detailPerbaikan_tanggal").html(formatTanggal(data.perbaikan.tgl_kerusakan));
                    $("#detail_selesai").html(data.perbaikan.tgl_selesai);
                    $("#status").html(data.perbaikan.status);
                    $("#ket").html(data.perbaikan.kerusakan);
                    if (data.perbaikan.status!='selesai') {
                        $("#keterangan").html(data.perbaikan.keterangan);
                    }

                    var myArray = data.daftar;
                    var list = $('#detail_perbaikan');
                    list.empty();
                    $.each(myArray, function(index, item) {
                        var listItem = $('<li>').text(item.jenis_perbaikan + " : " + item
                            .perbaikan);
                        list.append(listItem);
                    });
                })
            });
            $('body').on('click', '.btn-detail-hardware', function(event) {
                event.preventDefault();
                var id = $(this).data('id');
                $.get('/penggantian_hardware/' + id, function(data) {

                    console.log('result:', data);
                    $("#hardware").html(data.hardware.hardware.hardware);
                    $("#tanggal_penggantian").html(formatTanggal(data.hardware.tanggal_penggantian));
                    $("#hardware_lama").html(data.hardware.hardware_lama);
                    $("#hardware_baru").html(data.hardware.hardware_baru);
                })
            });
            $('body').on('click', '.btn-detail-software', function(event) {
                event.preventDefault();
                var id = $(this).data('id');
                $.get('/penggantian_software/' + id, function(data) {

                    console.log('result:', data);
                    $("#software").html(data.software.software.software);
                    $("#tanggal_penggantian_software").html(formatTanggal(data.software.tanggal_penggantian));
                    $("#software_lama").html(data.software.software_lama);
                    $("#software_baru").html(data.software.software_baru);
                })
            });

        });
    </script>
@endpush()
@section('content')
    <div class="pagetitle">
        <h1>Detail Komputer</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/komputer">Data Komputer</a></li>
                <li class="breadcrumb-item"><a href="/komputer/lab/{{ $data->lab->id }}">{{ $data->lab->nama_lab }}</a>
                </li>
                <li class="breadcrumb-item active">PC.{{ $data->no_pc }}</li>
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
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-7">
                <div class="row">

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Spesifikasi Komputer <span>| PC.{{ $data->no_pc }}</span></h5>

                                <table class="table table-bordered">
                                    <thead>

                                    <tbody>
                                        <tr>
                                            <th scope="row">No PC</th>
                                            <td>{{ $data->no_pc }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Lab Komputer</th>
                                            <td>{{ $data->lab->nama_lab }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row" width="50%">Kondisi</th>
                                            <td>
                                                <span
                                                    class="badge {{ $data->status == 'Normal' ? 'bg-success text-white' : 'bg-warning text-dark' }} "><i
                                                        class="bi {{ $data->status == 'Normal' ? 'bi-check-circle' : 'bi-exclamation-triangle' }}  me-1"></i>
                                                    {{ $data->status }}</span>

                                            </td>

                                        </tr>

                                    </tbody>
                                </table>

                                <div class="row">
                                    <div class="col-xxl-6">



                                        <h5 class="card-title d-flex justify-content-between">hardware
                                            @if (!$unlink_hw->isEmpty())
                                                <button type="button" data-bs-target="#updatehardwareModal"
                                                    data-bs-toggle="modal" class="btn btn-primary btn-sm"><i
                                                        class="bi bi-arrow-repeat "></i> Update</button>
                                            @else
                                                <button type="button" class="btn btn-secondary btn-sm"><i
                                                        class="bi bi-arrow-repeat "></i> Update</button>
                                            @endif
                                        </h5>

                                        <table class="table table-bordered">
                                            <thead>

                                            <tbody>

                                                @foreach ($data_pc->hardwares as $detail)
                                                    <tr>
                                                        <th scope="row">{{ $detail->hardware }}</th>
                                                        <td>{{ $detail->pivot->keterangan }}</td>


                                                    </tr>
                                                @endforeach

                                                @foreach ($unlink_hw as $detail)
                                                    <tr>
                                                        <th scope="row">{{ $detail->hardware }}</th>
                                                        <td>-</td>


                                                    </tr>
                                                @endforeach





                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-xxl-6">
                                        <h5 class="card-title d-flex align-items-center justify-content-between">Software
                                            @if (!$unlink_sw->isEmpty())
                                                <button type="button" data-bs-target="#updatesoftwareModal"
                                                    data-bs-toggle="modal" class="btn btn-primary btn-sm"><i
                                                        class="bi bi-arrow-repeat "></i> Update</button>
                                            @else
                                                <button type="button" class="btn btn-secondary btn-sm"><i
                                                        class="bi bi-arrow-repeat "></i> Update</button>
                                            @endif
                                        </h5>
                                        <table class="table table-bordered">
                                            <thead>

                                            <tbody>

                                                @foreach ($data_pc->softwares as $detail)
                                                    <tr>
                                                        <th scope="row">{{ $detail->software }}</th>
                                                        <td>{{ $detail->pivot->keterangan }}</td>


                                                    </tr>
                                                @endforeach

                                                @foreach ($unlink_sw as $detail)
                                                    <tr>
                                                        <th scope="row">{{ $detail->software }}</th>
                                                        <td>-</td>


                                                    </tr>
                                                @endforeach





                                            </tbody>
                                        </table>
                                    </div>

                                </div>



                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-5">

                <!-- Recent Activity -->
                <div class="card">


                    <div class="card-body">
                        <h5 class="card-title">Riwayat</h5>

                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Pemeliharaan
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul class="list-group">
                                            @if ($daftar_pemeliharaan->isEmpty())
                                                <h5 class="text-center text-secondary my-2">Belum ada data Pemeliharaan
                                                </h5>
                                            @endif
                                            @foreach ($daftar_pemeliharaan as $pemeliharaan)
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center fw-bold font-monospace">
                                                    <span>
                                                        @if ($pemeliharaan->perbaikan == 'tidak butuh perbaikan')
                                                            <i class="bi bi-check-circle me-1 text-success"></i>
                                                        @else
                                                            <i class="bi bi-exclamation-octagon me-1 text-warning"></i>
                                                        @endif
                                                        @carbon($pemeliharaan->tanggal)
                                                    </span>
                                                    <button data-bs-toggle="modal" data-bs-target="#detailModal"
                                                        data-id="{{ $pemeliharaan->id }}" type="button"
                                                        class="btn btn-primary btn-sm my-1 btn-detail"><i
                                                            class="bi bi-info-circle"></i>
                                                    </button>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        Perbaikan
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ol class="list-group list-group-numbered">
                                            @if ($daftar_perbaikan->isEmpty())
                                                <h5 class="text-center text-secondary my-2">Belum ada data perbaikan</h5>
                                            @endif
                                            @foreach ($daftar_perbaikan as $perbaikan)
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">

                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">
                                                            @carbon_short($perbaikan->tgl_kerusakan)
                                                            <span
                                                                class="badge {{ $perbaikan->status == 'menunggu perbaikan' ? 'bg-warning text-dark ' : 'bg-primary text-white' }} ">
                                                                {{ $perbaikan->status }}</span>
                                                        </div>
                                                        {{ $perbaikan->kerusakan }}
                                                    </div>
                                                    {{-- <span class="badge bg-success rounded-pill">{{ $perbaikan->status }}</span> --}}
                                                    <div class="">
                                                        <button data-bs-toggle="modal"
                                                            data-bs-target="#detailPerbaikanModal"
                                                            data-id="{{ $perbaikan->id }}" type="button"
                                                            class="btn btn-primary btn-sm my-1 btn-detail-perbaikan"><i
                                                                class="bi bi-info-circle"></i>
                                                            <span class="d-none d-sm-inline"></span>

                                                        </button>
                                                    </div>
                                                </li>
                                            @endforeach

                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Penggantian Hardware
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        @if ($daftar_penggantian_hardware->isEmpty())
                                            <h5 class="text-center text-secondary my-2">Belum ada data Penggantian</h5>
                                        @endif
                                        @foreach ($daftar_penggantian_hardware as $penggantian)
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center fw-bold font-monospace">
                                                <span>
                                                    <i class="bi bi-check-circle-fill fw-bold me-1 text-success"></i>
                                                    {{ $penggantian->hardware->hardware }}:{{ $penggantian->hardware_baru }}
                                                </span>
                                                <button data-bs-toggle="modal"
                                                    data-bs-target="#detailPenggantianHardwareModal"
                                                    data-id="{{ $penggantian->id }}" type="button"
                                                    class="btn btn-primary btn-sm my-1 btn-detail-hardware"><i
                                                        class="bi bi-info-circle"></i>
                                                </button>
                                            </li>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Penggantian Software
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        @if ($daftar_penggantian_software->isEmpty())
                                            <h5 class="text-center text-secondary my-2">Belum ada data Penggantian</h5>
                                        @endif
                                        @foreach ($daftar_penggantian_software as $penggantian)
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center fw-bold font-monospace">
                                                <span>
                                                    <i class="bi bi-check-circle-fill fw-bold me-1 text-success"></i>
                                                    {{ $penggantian->software->software }}:{{ $penggantian->software_baru }}
                                                </span>
                                                <button data-bs-toggle="modal"
                                                    data-bs-target="#detailPenggantianSoftwareModal"
                                                    data-id="{{ $penggantian->id }}" type="button"
                                                    class="btn btn-primary btn-sm my-1 btn-detail-software"><i
                                                        class="bi bi-info-circle"></i>
                                                </button>
                                            </li>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div><!-- End Recent Activity -->

            </div><!-- End Right side columns -->

        </div>
    </section>
@endsection
