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
                    <h5 class="modal-title">Tambah Data Aset </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class=" needs-validation" action="/aset" method="POST" novalidate>
                    <div class="modal-body">
                        @csrf
                        <div class="form-floating mb-3 has-validation">
                            <input type="text" class="form-control" name="aset" maxlength="255" id="floatingName"
                                placeholder="Your Name" required>
                            <label for="floatingName">aset</label>
                            <div class="invalid-feedback">
                               aset harus diisi
                            </div>
                        </div>
                        <div class="form-floating mb-3 has-validation">
                            <select class="form-select" name="lab_id" id="floatingSelect" aria-label="State" required>
                                <option label=" " hidden disabled selected></option>
                                @foreach ($data as $lab)
                                    <option value="{{ $lab->id }}">{{ $lab->nama_lab }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Lab Komputer</label>
                            <div class="invalid-feedback">
                                Silahkan isi Lab Komputer
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="kondisi_input" name="kondisi" aria-label="State" required>

                                    <option value="baik">Baik</option>
                                    <option value="buruk">Buruk</option>

                            </select>
                            <label for="floatingSelect"> Silahkan isi Kondisi Aset Lab</label>
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
                    <h5 class="modal-title">Edit Data Aset </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="needs-validation" id="form-edit" method="post" novalidate>

                    <div class="modal-body">

                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3 has-validation">
                            <input type="text" class="form-control" name="aset" maxlength="255" id="nama-edit"
                                placeholder="Your Name" required>
                            <label for="floatingName">Aset</label>
                            <div class="invalid-feedback">
                                Aset harus diisi
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
                        <div class="form-floating mb-3">
                            <select class="form-select" id="kondisi" name="kondisi" aria-label="State" required>

                                    <option value="baik">Baik</option>
                                    <option value="buruk">Buruk</option>

                            </select>
                            <label for="floatingSelect"> Silahkan isi Kondisi Aset Lab</label>
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
                $('#form-hapus').attr('action', 'aset/' + id);
            });
            $('body').on('click', '.edit-data', function(event) {
                event.preventDefault();
                var lab = $(this).data('lab');
                $('#selectLab').val(lab);

              $('#kondisi').val($(this).data('kondisi'))

              $('#nama-edit').val( $(this).data('aset'));
              var id = $(this).data('id');
              $('#form-edit').attr('action', 'aset/' + id);

            });

        });
    </script>
@endpush()
@section('content')
<div class="pagetitle">

    <h1>Master Aset</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Aset</li>

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
                                <th scope="col">Aset</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>

                            @foreach ($data as $lab)

                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td > {{ $lab->nama_lab }}</td>

                                    <td>
                                        @if ($lab->aset->isEmpty())
                                        <div>-</div>
                                        @endif
                                    @foreach ($lab->aset as $aset )
                                    <div class="d-flex justify-content-between my-2">
                                        <div>
                                        {{ $aset->aset }} <span class="ml-2 badge rounded-pill {{ $aset->kondisi=='baik'?'bg-primary':'bg-danger' }}">{{ $aset->kondisi }}</span>
                                    </div>
                                        <span class="float-right">
                                            <button type="button" class="btn btn-success edit-data btn-sm"
                                            data-bs-target="#editModal" data-lab="{{ $lab->id }}"
                                            data-id="{{ $aset->id }}" data-aset="{{ $aset->aset }}" data-kondisi="{{ $aset->kondisi }}" data-bs-toggle="modal"><i
                                            class="bi bi-pencil-square"></i> </button>

                                            <button type="button" class="btn btn-danger hapus-data btn-sm"
                                            data-bs-target="#hapusModal" data-id="{{ $aset->id }}"
                                            data-nama="{{ $aset->aset }}" data-bs-toggle="modal"><i
                                            class="bi bi-trash-fill"></i> </button>
                                        </span>
                                    </div>
                                    @endforeach
                                </td>

                                        {{-- <button type="button" class="btn hapus-data btn-danger"
                                            data-bs-toggle="modal" data-id="{{ $hw->id }}"
                                            data-nama="{{ $hw->nama_lab }}" data-bs-target="#hapusModal"><i
                                                class="bi bi-trash-fill"></i></button>  --}}
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
