@extends('templates.index')
@push('additional-js')
    <script>
        $(document).ready(function() {
            $("#input_hardware").hide();
            $("#input_software").hide();
            $("#input_lainnya").hide();
            var deskripsi = ""
            $("#jenis_perbaikan").change(function() {
                console.log("cek");
                if ($(this).val() === "penggantian hardware") {
                    $("#input_hardware").show();
                    $("#input_software").hide();
                    $("#input_lainnya").hide();
                    // get data hardware
                    $.ajax({
                        url: '/hardware/' + {{ $detail->lab->id }},
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            var hwSelect = $('#hardware');


                            $.each(data, function(hardware, id) {
                                hwSelect.append($('<option>', {
                                    value: id,
                                    text: hardware,
                                    'data-keterangan': hardware
                                }));
                            });

                        },
                        error: function(error) {
                            console.error('Error fetching PC data', error);
                        }
                    });
                    // tambah list


                } else if ($(this).val() === "instal software") {
                    $("#input_hardware").hide();
                    $("#input_software").show();
                    $("#input_lainnya").hide();
                    $.ajax({
                        url: '/software/' + {{ $detail->lab->id }},
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            var swSelect = $('#software');


                            $.each(data, function(software, id) {
                                swSelect.append($('<option>', {
                                    value: id,
                                    text: software,
                                    'data-keterangan': software
                                }));
                            });

                        },
                        error: function(error) {
                            console.error('Error fetching PC data', error);
                        }
                    });

                } else {
                    $("#input_hardware").hide();
                    $("#input_software").hide();
                    $("#input_lainnya").show();

                }
            });

            $('#tambah_perbaikan').on('click', function() {
                if ($("#jenis_perbaikan").val() === "penggantian hardware") {

                    deskripsi = $('#hardware option:selected').data('keterangan') + ' ' + $(
                        '#hardware_pengganti').val()
                    id = $('#hardware').val()
                    pengganti = $('#hardware_pengganti').val()
                    $('#hardware_pengganti').val('')
                    $('#hardware').val('')

                } else if ($("#jenis_perbaikan").val() === "instal software") {


                    deskripsi = $('#software option:selected').data('keterangan') + ' ' + $(
                        '#software_pengganti').val()
                    pengganti = $('#software_pengganti').val()
                    id = $('#software').val()
                    $('#software_pengganti').val('')
                    $('#software').val('');


                } else {

                    deskripsi = $('textarea#input_perbaikan').val()
                    $('textarea#input_perbaikan').val(' ')
                    id = ''
                    pengganti = ''

                }

                tambahList(deskripsi, id, pengganti)
                // checkHiddenInput();
            });

            // mendisable tombol simpan saat tidak ada daftar perbaikan yang belum tersimpan
            // function checkHiddenInput() {
            //     var isHiddenInputExist = $('#inputPerbaikan').length > 0;
            //     console.log(isHiddenInputExist);
            //     $('#saveBtn').prop('disabled', !isHiddenInputExist);
            // }
            // checkHiddenInput();
            // //update status tombol
            // $('#formPerbaikan').on('change keyup', function() {
            //     checkHiddenInput();
            // });

            function tambahList(deskripsi, id, pengganti) {

                var jenisPerbaikan = $('#jenis_perbaikan').val();
                if (jenisPerbaikan.trim() !== '') {
                    var perbaikanItem = ""
                    perbaikanItem = $(
                        '<li class="list-group-item d-flex justify-content-between align-items-start">' +
                        '<div class="ms-2 me-auto">' +
                        '<div class="fw-bold">' + jenisPerbaikan + '</div>' +
                        deskripsi +
                        // Ganti dengan deskripsi perbaikan yang sesuai
                        '</div>' +
                        '<button class="btn badge bg-danger rounded-pill remove-btn"><i class="bi bi-trash-fill"></i> hapus</button>' +
                        '<input type="hidden" name="jenis_perbaikan[]" id="inputPerbaikan" value="' +
                        jenisPerbaikan + '">' +
                        '<input type="hidden" name="perbaikan[]" value="' + deskripsi + '">' +
                        '<input type="hidden" name="id[]" value="' + id + '">' +
                        '<input type="hidden" name="pengganti[]" value="' + pengganti + '">' +
                        '</li>'
                    );
                    $('#perbaikan-list').append(perbaikanItem);
                    $('#jenis-perbaikan').val('');
                }
            }
            $('#perbaikan-list').on('click', '.remove-btn', function() {
                $(this).parent().remove();
                // checkHiddenInput();
            });


        });
    </script>
@endpush()
@section('content')
    <div class="pagetitle">

        <h1>Perbaikan Komputer </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/perbaikan">Perbaikan Komputer</a></li>
                <li class="breadcrumb-item active ">PC.01</li>

            </ol>
        </nav>
    </div><!-- End Page Title -->
    @if (session()->has('update'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            <span class="fw-bold">Pembaruan data berhasil: </span></span>Data <span
                class="text-danger">{{ session('update') }}</span> berhasil diperbarui
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <section class="section">
        <div class="row">
            <div class="col-lg-4">
                <!-- Recent Activity -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Kerusakan</h5>
                        <table class="table table-bordered">
                            <thead>

                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">No PC</th>
                                    <td>{{ $detail->pc->no_pc }}</td>

                                </tr>
                                <tr>
                                    <th scope="row">Lab</th>
                                    <td>{{ $detail->lab->nama_lab }}</td>

                                </tr>
                                <tr>
                                    <th scope="row">Tanggal</th>
                                    <td>@carbon_short($detail->tgl_kerusakan)</td>

                                </tr>
                                <tr>
                                    <th scope="row">Status</th>
                                    <td>
                                        <span
                                            class="badge {{ $detail->status == 'menunggu perbaikan' ? 'bg-warning text-dark ' : ($detail->status == 'selesai' ? 'bg-success text-white' : 'bg-primary text-white') }} ">
                                            {{ $detail->status }}</span>

                                    </td>

                                </tr>
                                <tr>
                                    <th colspan="2" scope="row">
                                        kerusakan
                                        <div class="fw-normal">
                                            {{ $detail->kerusakan }}
                                        </div>


                                    </th>


                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div><!-- End Recent Activity -->

            </div><!-- End Right side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <form class=" needs-validation" action="/perbaikan/{{ $detail->id }}" method="post"
                            id="formPerbaikan" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">

                                    <h5 class="card-title">Data Perbaikan <span>| {{ auth()->user()->role->role }}
                                        </span></h5>
                                    <div class="row mb-2">
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="jenis_perbaikan" aria-label="State">
                                                    <option value="" selected disabled hidden></option>
                                                    <option value="penggantian hardware">Penggantian Hardware</option>
                                                    <option value="instal software">Instal Software</option>
                                                    <option value="perbaikan lainnya">Perbaikan Lainnya</option>
                                                </select>
                                                <label for="floatingSelect">Jenis Perbaikan</label>
                                            </div>


                                            <div id="input_hardware">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" name="hardware" id="hardware"
                                                        aria-label="State">
                                                        <option value="" selected disabled hidden></option>

                                                    </select>
                                                    <label for="floatingSelect">Hardware</label>
                                                </div>
                                                <div class="form-floating mb-3 has-validation">
                                                    <input type="text" class="form-control" name="hardware_pengganti"
                                                        id="hardware_pengganti" maxlength="255" id="floatingName"
                                                        placeholder="Your Name">
                                                    <label for="floatingName">Hardware Pengganti</label>
                                                    <div class="invalid-feedback">
                                                        Hardware harus diisi
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="input_software">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" id="software" aria-label="State">
                                                    </select>
                                                    <label for="floatingSelect">Software</label>
                                                </div>
                                                <div class="form-floating mb-3 has-validation">
                                                    <input type="text" class="form-control" id="software_pengganti"
                                                        name="software" maxlength="255" id="floatingName"
                                                        placeholder="Your Name">
                                                    <label for="floatingName">Software yang di instal </label>
                                                    <div class="invalid-feedback">
                                                        Software harus diisi
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3 has-validation" id="input_lainnya">

                                                <textarea class="form-control" name="perbaikan" id="input_perbaikan" maxlength="255" placeholder="Your Name"
                                                    style="height: 100px"></textarea>

                                                <label for="floatingName">Detail perbaikan </label>
                                                <div class="invalid-feedback">
                                                    Detail keterangan harus diisi!
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <a class="btn btn-success" id="tambah_perbaikan">Tambah</a>
                                            </div>

                                        </div>
                                        <div class="col-md-8">
                                            {{-- <h5 class="text-center my-4 text-secondary">Belum ada Perbaikan</h5> --}}

                                            <ol class="list-group list-group-numbered" id="perbaikan-list">
                                                @foreach ($daftar_perbaikan as $perbaikan)
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-start">
                                                        <div class="ms-2 me-auto">
                                                            <div class="fw-bold">{{ $perbaikan->jenis_perbaikan }}</div>
                                                            {{ $perbaikan->perbaikan }}
                                                        </div>
                                                    </li>
                                                @endforeach

                                            </ol>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="status" name="status" aria-label="State"
                                            required>
                                            <option value="" selected disabled hidden></option>
                                            <option value="Dalam Perbaikan"
                                                {{ $detail->status == 'Dalam Perbaikan' ? 'selected' : '' }}>Dalam
                                                Perbaikan
                                            </option>
                                            <option value="selesai" {{ $detail->status == 'selesai' ? 'selected' : '' }}>
                                                selesai
                                            </option>
                                        </select>
                                        <label for="floatingSelect">Status</label>
                                        <div class="invalid-feedback">
                                            Data Status harus diisi!
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <button class="btn btn-primary" id="saveBtn">Update Data</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- End Recent Sales -->

                </div>
            </div><!-- End Left side columns -->



        </div>

    </section>
@endsection
