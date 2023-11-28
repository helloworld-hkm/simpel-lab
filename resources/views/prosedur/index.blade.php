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
    <div class="modal fade" id="tambahModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Daftar Prosedur </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class=" needs-validation" action="/prosedur" method="POST" novalidate>
                    <div class="modal-body">
                        @csrf
                        <div class="form-floating mb-3 has-validation">
                            <textarea class="form-control" placeholder="Prosedur" id="floatingTextarea" name="keterangan" style="height: 100px;" required></textarea>
                            <label for="floatingName">Deskripsi Prosedur</label>
                            <div class="invalid-feedback">
                                Deskripsi harus diisi !
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
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Daftar Prosedur </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="needs-validation" id="form-edit" method="post" novalidate>

                    <div class="modal-body">

                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3 has-validation">
                            <textarea class="form-control" placeholder="Prosedur" id="keterangan" name="keterangan" style="height: 100px;" required></textarea>
                            <label for="floatingName">Nama Lab</label>
                            <div class="invalid-feedback">
                              Deskripsi harus diisi !
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

@endpush
@push('additional-js')
    <script>
        $(document).ready(function() {

            $('.hapus-data').on('click', function() {
                var keterangan = $(this).data('keterangan');
                var id = $(this).data('id');

                $("#konfirmasi_hapus").text(keterangan);
                $('#form-hapus').attr('action', 'prosedur/' + id);
            });
            $('body').on('click', '.edit-data', function(event) {
                event.preventDefault();
                var keterangan = $(this).data('keterangan');
                $("#keterangan").text(keterangan);
                var id = $(this).data('id');
                $('#form-edit').attr('action', 'prosedur/' + id);

            });

        });
    </script>
@endpush()
@section('content')
<div class="pagetitle">

    <h1>Prosedur Pemeliharaan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Prosedur Pemeliharaan</li>

        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
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
    @if ($errors->has('nama_lab'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-octagon me-1"></i>

            <span class="fw-bold">Gagal Menyimpan: </span> Nama  <span class="text-secondary">
                {{ $errors->first('nama_lab') }}</span> sudah digunakan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('nama_lab_sama'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-octagon me-1"></i>

            <span class="fw-bold">Gagal Menyimpan: </span> Nama  <span class="text-secondary">
                {{ session('nama_lab_sama') }}</span> sudah digunakan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">

            <div class="card">

                <div class="card-body">
                    <div class="card-title">
                        <button class="btn btn-primary" data-bs-target="#tambahModal" data-bs-toggle="modal"><i
                                class="bi bi-plus"></i> Tambah Data</button>
                    </div>
                    <!-- Table with stripped rows -->
                    <table class="table datatable table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Daftar Prosedur</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($data as $prosedur)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td> {{ $prosedur->keterangan }}</td>


                                    <td>
                                        <button type="button" class="btn btn-success edit-data btn-sm"
                                            data-bs-target="#editModal" data-keterangan="{{ $prosedur->keterangan }}"
                                            data-id="{{ $prosedur->id }}" data-bs-toggle="modal"><i
                                                class="bi bi-pencil-square"></i></button>


                                        <button type="button" class="btn hapus-data btn-danger btn-sm"
                                            data-bs-toggle="modal" data-id="{{ $prosedur->id }}"
                                            data-keterangan="{{ $prosedur->keterangan }}" data-bs-target="#hapusModal"><i
                                                class="bi bi-trash-fill"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>
@endsection
