@extends('templates.index')
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
                <span class="fw-bold">Tambah data berhasil: </span>Data <span
                    class="text-danger">{{ session('success') }}</span> berhasil ditambahkan ke Sistem
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
            <div class="col-lg-12">

                <div class="card">

                    <div class="card-body">
                        <div class="card-title">
                            <button class="btn btn-primary" data-bs-target="#tambahModal" data-bs-toggle="modal"><i
                                    class="bi bi-plus"></i> Input Kerusakan</button>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatable table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Laboratorium</th>
                                    <th scope="col">No Pc</th>
                                    <th scope="col">Kerusakan</th>
                                    <th scope="col">Status</th>
                                    {{-- <th scope="col">Telepon</th> --}}

                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($list_perbaikan as $perbaikan)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td> @carbon_mid($perbaikan->tgl_kerusakan) </td>
                                        <td> {{ $perbaikan->lab->nama_lab }} </td>
                                        <td> {{ $perbaikan->pc->no_pc }} </td>
                                        <td> {{ $perbaikan->kerusakan }} </td>
                                        <td><span
                                                class="badge rounded-pill {{ $perbaikan->status == 'selesai' ? ' bg-success ' : ($perbaikan->status == 'menunggu perbaikan' ? ' bg-warning ' : ' bg-primary ') }}">{{ $perbaikan->status }}</span>
                                        </td>
                                        {{-- <td>{{ $user->phone }}</td> --}}

                                        <td>
                                            @if ($perbaikan->status != 'selesai')
                                                <button type="button" class="btn btn-danger edit-user btn-sm"
                                                    data-bs-target="#editModal" data-id="{{ $perbaikan->id }}"
                                                    data-bs-toggle="modal"><i class="bi bi-eye"></i></button>
                                            @else
                                                <button type="button" class="btn btn-primary edit-user btn-sm"
                                                    data-bs-target="#editModal" data-id="{{ $perbaikan->id }}"
                                                    data-bs-toggle="modal"><i class="bi bi-info-circle"></i></button>
                                            @endif

                                            {{--
                                    <button type="button"
                                        class="btn {{ $user->role_id == 1 ? 'btn-secondary' : 'btn-warning' }} edit-role btn-sm"
                                        data-user-role="{{ $user->role_id }}" data-user-id="{{ $user->id }}"
                                        data-bs-toggle="modal" data-bs-target="#editRoleModal"
                                        {{ $user->role_id == 1 ? 'disabled' : '' }}><i
                                            class="bi bi-key"></i></button>
                                    <button type="button"
                                        class="btn hapus-data btn-sm {{ $user->role_id == 1 ? 'btn-secondary' : 'btn-danger' }}"{{ $user->role_id == 1 ? 'disabled' : '' }}
                                        data-bs-toggle="modal" data-id="{{ $user->id }}"
                                        data-username="{{ $user->username }}" data-bs-target="#hapusModal"><i
                                            class="bi bi-trash-fill"></i></button> --}}
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
