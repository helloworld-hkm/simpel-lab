@extends('templates.index')
@push('modal-action')
    <div class="modal  fade" id="hapusModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-exclamation-octagon me-1"></i> Hapus Data <span
                            id="konfirmasi_hapus" class="fw-bold"></span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                    <form id="form-hapus" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Hapus Data</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <div class="modal  fade" id="tambahModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollables modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Hardware </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class=" needs-validation" id="formTambah" action="/komputer/simpan" method="POST" novalidate>
                    <div class="modal-body">
                        @csrf

                        <div class="form-floating mb-3 has-validation">
                            <input type="text" class="form-control" name="nama_lab" value="{{ $lab->nama_lab }}"
                                maxlength="255" id="floatingName" placeholder="Your Name" required disabled>
                            <input type="text" class="form-control" id="lab_id" name="lab_id"
                                value="{{ $lab->id }}" maxlength="255" id="floatingName" placeholder="Your Name"
                                required hidden>
                            <label for="floatingName">Lab</label>
                            <div class="invalid-feedback">
                                Lab harus diisi
                            </div>
                        </div>
                        <div class="form-floating mb-3 has-validation">
                            <input type="number" class="form-control" id="no_pc" name="no_pc" maxlength="255"
                                id="floatingName" placeholder="Your Name" required>

                            <label for="floatingName">Nomor PC </label>
                            <div class="invalid-feedback" id="invalid-noPc">
                                No Pc harus diisi
                            </div>
                        </div>
                        {{-- <div class="form-floating mb-3 has-validation">
                            <select class="form-select" name="status" id="floatingSelect" aria-label="State" required>
                                <option label=" " hidden disabled selected></option>

                                <option value="Normal" selected>Normal</option>
                                <option value="Butuh Perbaikan">Butuh Perbaikan</option>

                            </select>
                            <label for="floatingSelect">Kondisi PC</label>
                            <div class="invalid-feedback">
                                Silahkan isi Kondisi PC
                            </div>
                        </div> --}}
                        <h5 class="card-title">Hardware</h5>
                        <div class="row">
                            @foreach ($list as $ls_hardware)
                                <div class="col-lg-6">
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
                        <h5 class="card-title">Software</h5>
                        <div class="row">
                            @foreach ($software as $ls_software)
                                <div class="col-lg-6">
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
                        <button class="btn btn-primary simpan-data">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{-- <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Hardware </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="needs-validation" id="form-edit" method="post" novalidate>

                    <div class="modal-body">

                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3 has-validation">
                            <input type="text" class="form-control" name="hardware" maxlength="255" id="nama-edit"
                                placeholder="Your Name" required>
                            <label for="floatingName">Hardware</label>
                            <div class="invalid-feedback">
                                Hardware harus diisi
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="selectLab" name="lab_id" aria-label="State" required>
                                @foreach ($data as $lab)
                                    <option value="{{ $lab->id }}">{{ $lab->nama_lab }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect"> Silahkan isi Lab Komputer</label>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div> --}}
@endpush
@push('additional-js')
    <script>
        $(document).ready(function() {
            // $('#formTambah').submit(function(event) {
            //     console.log("cek");
            //     var id = $('#no_pc').val();
            //     var lab_id = $('#lab_id').val();
            //     var valid = false
            //     event.preventDefault();
            //     $.get('/komputer/getData/' + id + '/' + lab_id, function(data) {
            //         // $('#modal-student-edit').modal('show');
            //         console.log("cek data :", data.data.length);
            //         if (!data.data.length == 0) {
            //             $('#no_pc').val("").focus();
            //             $('#invalid-noPc').html("No Pc tidak Boleh Sama");
            //         } else if (data.data.length == 0) {
            //             var valid = true
            //             //   $('#formTambah').attr('action', 'komputer/simpan' );
            //             console.log("true");
            //         }

            //         // // Lakukan validasi formulir
            //         if (!valid) {
            //             // Hentikan pengiriman formulir jika validasi gagal
            //             console.log("form tertahan");

            //         } else {
            //             console.log("reload");
            //             $('#formTambah').attr('action', '/komputer/simpan');
            //             $('#formTambah').submit();

            //         }

            //     })

            // });

            $('#formTambah').submit(function(event) {
                console.log("cek");
                var id = $('#no_pc').val();
                var lab_id = $('#lab_id').val();

                // Defaultnya, kita anggap formulir tidak valid
                var valid = false;

                $.ajax({
                    url: '/komputer/getData/' + id + '/' + lab_id,
                    method: 'GET',
                    async: false, // Tunggu hingga permintaan selesai
                    success: function(data) {
                        console.log("cek data :", data.data.length);
                        if (!data.data.length == 0) {
                            $('#no_pc').val("").focus();
                            $('#invalid-noPc').html("No Pc tidak Boleh Sama");
                        } else {
                            valid = true;
                        }
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });

                console.log("value valid:", valid);

                // Jika formulir tidak valid, mencegah pengiriman formulir dengan event.preventDefault()
                if (!valid) {
                    console.log("valid false, return false");
                    return false;
                } else {
                    console.log("valid true");
                    // Jika formulir valid, set action dan formulir akan dikirim
                    $('#formTambah').attr('action', '/komputer/simpan');
                    // Anda juga bisa langsung melakukan submit formulir di sini jika Anda ingin menggunakan
                    // aksi yang sudah diatur di form, dengan cara seperti:
                    // $('#formTambah').submit();
                }
            });

            $('.simpan-data').on('click', function() {


            });
            $('body').on('click', '.edit-data', function(event) {
                event.preventDefault();
                var role = $(this).data('role');
                $('#selectPJ').val(role);

                var id = $(this).data('id');
                $.get('/lab/' + id + '/edit', function(data) {
                    // $('#modal-student-edit').modal('show');

                    $('#nama-edit').val(data.lab.nama_lab);


                    $('#form-edit').attr('action', 'lab/' + data.lab.id);

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
                <li class="breadcrumb-item"><a href="/komputer">Lab Komputer</a></li>
                <li class="breadcrumb-item active"> {{ $lab->nama_lab }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <button class="btn btn-primary mb-3 tambah-data" data-bs-target="#tambahModal" data-bs-toggle="modal"><i
                class="bi bi-plus"></i>
            Tambah Data</button>

        {{-- alert success untuk tambah data --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <span class="fw-bold">Tambah data berhasil: </span>Data <span
                    class="text-danger">{{ session('success') }}</span> berhasil ditambahkan ke Sistem
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- alert success untuk hapus data --}}
        @if (session()->has('delete'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <span class="fw-bold">Hapus data sukses: </span>Data <span
                    class="text-danger">{{ session('delete') }}</span> telah dihapus dari sistem
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- alert untuk data lab --}}
        @if (session()->has('update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <span class="fw-bold">Pembaruan data berhasil: </span></span>Data <span
                    class="text-danger">{{ session('update') }}</span> berhasil diperbarui
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- alert untuk nama lab yang sama --}}
        @if ($errors->has('no_pc'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>

                <span class="fw-bold">Gagal Menyimpan: </span> Nomor PC <span class="text-secondary">
                    {{ $errors->first('no_pc') }}</span> sudah digunakan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('nomor_pc_sama'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>

                <span class="fw-bold">Gagal Menyimpan: </span> Nomor PC <span class="text-secondary">
                    {{ session('nomor_pc_sama') }}</span> sudah digunakan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            @if ($data->isEmpty())
                <h5 class="text-center">data kosong</h5>
            @endif
            @foreach ($data as $komputer)
                <div class="col-xxl-3 col-md-5">
                    <div class="card info-card revenue-card">
                        <a href="/komputer/detail/{{ $komputer->id }}/{{ $lab->id }}">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-between align-items-center"> <span
                                        class="{{ $komputer->status == 'Normal' ? 'text-primary' : 'text-danger' }} small  fw-bold">{{ $komputer->status }}</span>
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

    </section>
@endsection
