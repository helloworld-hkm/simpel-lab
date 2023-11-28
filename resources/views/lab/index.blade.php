@extends('templates.index ')
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
                    <h5 class="modal-title">Tambah Data Lab Komputer </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class=" needs-validation" action="/lab" method="POST" novalidate>
                    <div class="modal-body">
                        @csrf
                        <div class="form-floating mb-3 has-validation">
                            <input type="text" class="form-control" name="nama_lab" maxlength="30" id="floatingName"
                                placeholder="Your Name" required>
                            <label for="floatingName">Nama Lab</label>
                            <div class="invalid-feedback">
                                Silahkan isi Nama Lab Komputer contoh:(lab TKJ-1)
                            </div>
                        </div>
                        <div class="form-floating mb-3 has-validation">
                            <select class="form-select" name="role_id" id="floatingSelect" aria-label="State" required>
                                <option label=" " hidden disabled selected></option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->role }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Penanggung Jawab</label>
                            <div class="invalid-feedback">
                                Silahkan isi Penanggung jawab lab
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
                    <h5 class="modal-title">Edit Data Lab Komputer </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="needs-validation" id="form-edit" method="post" novalidate>

                    <div class="modal-body">

                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3 has-validation">
                            <input type="text" class="form-control" name="nama_lab" maxlength="30" id="nama-edit"
                                placeholder="Your Name" required>
                            <label for="floatingName">Nama Lab</label>
                            <div class="invalid-feedback">
                                Silahkan isi Nama Lab Komputer contoh:(lab TKJ-1)
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="selectPJ" name="role" aria-label="State" required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->role }}</option>
                                @endforeach

                            </select>
                            <label for="floatingSelect">Penanggung jawab Lab</label>
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
                var nama = $(this).data('nama');
                var id = $(this).data('id');

                $("#konfirmasi_hapus").text(nama);
                $('#form-hapus').attr('action', 'lab/' + id);
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

        <h1>Master Lab Komputer</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Lab</li>

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
                                    <th scope="col">Nama Lab</th>
                                    <th scope="col">Penanggung jawab</th>
                                    {{-- <th scope="col">Telepon</th> --}}

                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>

                                @foreach ($labs as $lab)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td> {{ $lab->nama_lab }}</td>
                                        <td> {{ $lab->role->role }}</td>

                                        {{-- <td>{{ $user->phone }}</td> --}}

                                        <td>
                                            <button type="button" class="btn btn-success edit-data btn-sm"
                                                data-bs-target="#editModal" data-role="{{ $lab->role_id }}"
                                                data-id="{{ $lab->id }}" data-bs-toggle="modal"><i
                                                    class="bi bi-pencil-square"></i></button>


                                            <button type="button" class="btn hapus-data btn-danger btn-sm"
                                                data-bs-toggle="modal" data-id="{{ $lab->id }}"
                                                data-nama="{{ $lab->nama_lab }}" data-bs-target="#hapusModal"><i
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
