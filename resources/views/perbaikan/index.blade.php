@extends('templates.index')
@push('modal-action')
    <div class="modal  fade" id="detailModal" tabindex="-1">
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
                                    <td id="detail_noPc"></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="50%">Tempat Alat</th>
                                    <td id="detail_lab"></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="50%">Tanggal Kerusakan</th>
                                    <td id="detail_tanggal"></td>
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

                                            </ul>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="" colspan="2" width="50%">
                                        <p><b>Detail Perbaikan</b> </p>
                                        <span>
                                            <ul id="detail_perbaikan">

                                            </ul>
                                        </span>
                                    </td>
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
            $('#labSelect').on('change', function() {
                var labId = $(this).val();
                $.ajax({
                    url: '/perbaikan/' + labId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var pcSelect = $('#pcSelect');
                        pcSelect.empty();
                        if ($.isEmptyObject(data)) {
                            pcSelect.append($('<option>', {
                                value: '',
                                text: 'Tidak ada nomor PC yang tersedia',
                                disabled: true,

                            }));
                        } else {
                            // Tambahkan opsi nomor PC ke dalam input kedua
                            // $.each(data, function(number, id) {
                            //     pcSelect.append($('<option>', {
                            //         value: id,
                            //         text: number
                            //     }));
                            // });
                            const dataArray = Object.entries(data);
                            dataArray.sort(([key1, value1], [key2, value2]) => parseInt(key1) - parseInt(key2));

                                console.log(dataArray)
                            // Iterasi array dan mengisi elemen dropdown
                            dataArray.forEach(([number, id]) => {
                                pcSelect.append($('<option>', {
                                    value: id,
                                    text: number
                                }));
                            });
                        }
                    },
                    error: function(error) {
                        console.error('Error fetching PC data', error);
                    }
                });
            });
            $('body').on('click', '.btn-detail', function(event) {
                event.preventDefault();
                var id = $(this).data('id');
                $.get('/perbaikan/detailPerbaikan/' + id, function(data) {
                    // console.log('pemeliharaan:', data);
                    // console.log('detail:', data.pemeliharaan.detail);
                    // console.log('pc:', data.pemeliharaan.pc);
                    $("#detail_noPc").html("PC." + data.perbaikan.pc.no_pc);
                    $("#detail_lab").html("Lab " + data.perbaikan.lab.nama_lab);
                    $("#detail_tanggal").html(formatTanggal(data.perbaikan.tgl_kerusakan));
                    $("#detail_selesai").html(formatTanggal(data.perbaikan.tgl_selesai));
                    $("#status").html(data.perbaikan.status);
                    $("#ket").html(data.perbaikan.kerusakan);
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
        });
    </script>
@endpush()
@section('content')
    <div class="pagetitle">

        <h1>Perbaikan Komputer</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Perbaikan Komputer</li>

            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">

        @if ($errors->has('username'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>

                <span class="fw-bold">Gagal Menyimpan: </span> Username <span class="text-secondary">
                    {{ $errors->first('username') }}</span> sudah digunakan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('username_sama'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>

                <span class="fw-bold">Edit Data Gagal: </span> Username <span class="text-secondary">
                    {{ session('username_sama') }}</span> sudah digunakan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('delete'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <span class="fw-bold">Hapus data sukses: </span>Data <span
                    class="text-danger">{{ session('delete') }}</span> telah dihapus dari sistem
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <span class="fw-bold">Tambah data berhasil: </span>Data Kerusakan <span
                    class="text-danger">PC.{{ session('success') }}</span> berhasil ditambahkan ke Sistem
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('selesai'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <span class="fw-bold">Perbaikan: </span>Kerusakan <span
                    class="text-danger">PC.{{ session('selesai') }}</span> Selesai Diperbaiki
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <span class="fw-bold">Pembaruan data berhasil: </span></span>Data <span
                    class="text-danger">{{ session('update') }}</span> berhasil diperbarui
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-4">
                <!-- Recent Activity -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Laporan Kerusakan</h5>
                        <form class=" needs-validation" action="/perbaikan" method="POST" novalidate>
                            @csrf
                            <div class="form-floating mb-3 has-validation">
                                <input type="datetime-local" class="form-control" name="tgl_kerusakan"
                                    value="{{ now() }}" maxlength="255" id="floatingName"
                                    placeholder="Your Name" required>

                                <label for="floatingName">Tanggal Kerusakan </label>
                                <div class="invalid-feedback">
                                    Tanggal harus diisi
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-floating mb-3 has-validation">
                                        <select class="form-select" name="lab_id" id="labSelect" aria-label="State"
                                            required>
                                            <option label=" " hidden disabled selected></option>
                                            @foreach ($lab as $l)
                                                <option value="{{ $l->id }}">{{ $l->nama_lab }}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelect">Lab Komputer</label>
                                        <div class="invalid-feedback">
                                            Silahkan isi Lokasi Pc
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3 has-validation">
                                        <select class="form-select" name="pc_id" id="pcSelect" aria-label="State"
                                            placeholeder="" required>
                                        </select>
                                        <label for="floatingSelect">No PC</label>
                                        <div class="invalid-feedback">
                                            Silahkan isi Nomor Pc
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3 has-validation" id="kerusakan_input">
                                {{-- <input type="text" class="form-control" > --}}
                                <textarea class="form-control" name="kerusakan" id="kerusakan" maxlength="255" placeholder="Your Name" required
                                    style="height: 50px"></textarea>

                                <label for="floatingName">Kerusakan </label>
                                <div class="invalid-feedback">
                                    Detail keterangan harus diisi!
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
                                <h5 class="card-title">Daftar kerusakan Komputer <span>| {{ auth()->user()->role->role }}
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
                                                    <span class="d-none d-sm-inline">Analisa</span>
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
        <div class="row">
            <div class="col-lg-12">


                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Riwayat Perbaikan</h5>

                        @if ($list_perbaikan_selesai->isEmpty())
                            <div>
                                <h5 class=" d-flex justify-content-center align-items-start text-secondary my-5">
                                    Belum ada Riwayat Perbaikan
                                </h5>
                            </div>
                        @endif
                        <ol class="list-group list-group-numbered">
                            @foreach ($list_perbaikan_selesai as $perbaikan)
                                <li class="list-group-item d-flex justify-content-between align-items-center">

                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">
                                            @carbon_short($perbaikan->tgl_kerusakan) <span class="fw-normal">| PC.{{ $perbaikan->pc->no_pc }} di
                                                Lab {{ $perbaikan->lab->nama_lab }}</span>
                                            <span class="badge bg-success text-white">
                                                {{ $perbaikan->status }}</span>
                                        </div>
                                        {{ $perbaikan->kerusakan }}
                                    </div>
                                    {{-- <span class="badge bg-success rounded-pill">{{ $perbaikan->status }}</span> --}}
                                    <div class="">
                                        <a href="/perbaikan/cetak/{{  $perbaikan->id }}/"
                                            class="btn btn-success btn-sm my-1 "><i
                                                class="bi bi-printer"></i>
                                            <span class="d-none d-sm-inline">Cetak</span>

                                        </a>
                                        <button data-bs-toggle="modal" data-bs-target="#detailModal"
                                            data-id="{{ $perbaikan->id }}" type="button"
                                            class="btn btn-primary btn-sm my-1 btn-detail"><i
                                                class="bi bi-info-circle"></i>
                                            <span class="d-none d-sm-inline">Detail </span>

                                        </button>
                                    </div>
                                </li>
                            @endforeach

                        </ol>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
