@extends('templates.index')
@push('modal-action')
    <div class="modal fade" id="editRoleModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Role </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="" id="form-edit-role" method="POST">

                    <div class="modal-body">

                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" name="role" aria-label="State" required>
                                @foreach ($roles as $role)
                                    @if ($role->id != 2 || $kepalaTKJT != '1')
                                        @if ($role->id != 3 || $kepalaAKL != '1')
                                            <option value="{{ $role->id }}">{{ $role->role }}</option>
                                        @else
                                            <option value="{{ $role->id }}" disabled>{{ $role->role }}</option>
                                        @endif
                                        @else
                                        <option value="{{ $role->id }}" disabled>{{ $role->role }}</option>
                                    @endif


                                @endforeach

                            </select>
                            <label for="floatingSelect">Role</label>
                        </div>


                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}

                        <button class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
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
                    <h5 class="modal-title">Tambah Pengguna </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class=" needs-validation" action="/pengguna" method="post" novalidate>

                    <div class="modal-body">

                        @csrf


                        <div class="form-floating mb-3 has-validation">
                            <input type="text" class="form-control" name="username" maxlength="16" id="floatingName"
                                placeholder="Your Name" required>
                            <label for="floatingName">Username</label>
                            <div class="invalid-feedback">
                                Silahkan isi Username
                            </div>
                        </div>


                        <div class="form-floating mb-3 has-validation">
                            <input type="text" class="form-control" name="fullname" maxlength="50" id="floatingFullName"
                                placeholder="Your Name" required>
                            <label for="floatingFullName">Nama Lengkap</label>
                            <div class="invalid-feedback">
                                Silahkan isi Nama Lengkap
                            </div>
                        </div>


                        <div class="form-floating mb-3 has-validation">
                            <input type="text" class="form-control" name="phone" maxlength="13" id="floatingFullName"
                                placeholder="Your Name" required>
                            <label for="floatingFullName">Telepon</label>
                            <div class="invalid-feedback">
                                Silahkan isi Nomor Telepon
                            </div>
                        </div>



                        <div class="form-floating mb-3   has-validation">
                            <input type="text" class="form-control" name="password" id="floatingPassword"
                                placeholder="Password" required>
                            <label for="floatingPassword">Password</label>
                            <div class="invalid-feedback">
                                Password harus diisi!
                            </div>
                        </div>


                        <div class="form-floating mb-3 has-validation">
                            <select class="form-select" name="role_id" id="floatingSelect" aria-label="State" required>
                                <option label=" " hidden disabled selected></option>
                                @foreach ($roles as $role)
                                    @if ($role->id != 2 || $kepalaTKJT != '1')
                                        @if ($role->id != 3 || $kepalaAKL != '1')
                                            <option value="{{ $role->id }}">{{ $role->role }}</option>
                                        @else
                                            <option value="{{ $role->id }}" disabled>{{ $role->role }}</option>
                                        @endif
                                        @else
                                        <option value="{{ $role->id }}" disabled>{{ $role->role }}</option>

                                    @endif
                                @endforeach
                            </select>
                            <label for="floatingSelect">Role</label>
                            <div class="invalid-feedback">
                                Silahkan isi Role
                            </div>
                        </div>

                        <div class="form-floating has-validation">
                            <textarea class="form-control" placeholder="Address" name="address" id="floatingTextarea" style="height: 100px;"
                                required></textarea>
                            <label for="floatingTextarea">Alamat</label>
                            <div class="invalid-feedback">
                                Silahkan isi Alamat
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
                    <h5 class="modal-title">Edit Data Pengguna </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="needs-validation" id="form-edit" method="post" novalidate>

                    <div class="modal-body">

                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3 has-validation">
                            <input type="text" class="form-control" id="username-edit" maxlength="16"
                                name="username" id="floatingName" placeholder="Your Name" required>
                            <label for="floatingName">Username</label>
                            <div class="invalid-feedback">
                                Silahkan isi Username
                            </div>
                        </div>


                        <div class="form-floating mb-3 has-validation">
                            <input type="text" class="form-control" id="name-edit" name="fullname"
                                id="floatingFullName" placeholder="Your Name" maxlength="50" required>
                            <label for="floatingFullName">Nama Lengkap</label>
                            <div class="invalid-feedback">
                                Silahkan isi Nama Lengkap
                            </div>
                        </div>


                        <div class="form-floating mb-3 has-validation">
                            <input type="text" class="form-control" id="phone-edit" name="phone"
                                id="floatingFullName" placeholder="Your Name" maxlength="13" required>
                            <label for="floatingFullName">Telepon</label>
                            <div class="invalid-feedback">
                                Silahkan isi Nomor Telepon
                            </div>
                        </div>


                        <div class="form-floating has-validation">
                            <textarea class="form-control" placeholder="Address" name="address" id="address-edit" style="height: 100px;"
                                required></textarea>
                            <label for="floatingTextarea">Alamat</label>
                            <div class="invalid-feedback">
                                Silahkan isi Alamat
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
            $('.edit-role').on('click', function() {
                var userRole = $(this).data('user-role');
                var id = $(this).data('user-id');

                $('#floatingSelect').val(userRole);
                $('#form-edit-role').attr('action', 'pengguna/' + id);
            });
            $('.hapus-data').on('click', function() {
                var username = $(this).data('username');
                var id = $(this).data('id');
                $("#konfirmasi_hapus").text(username);
                $('#form-hapus').attr('action', 'pengguna/' + id);
            });
            $('body').on('click', '.edit-user', function(event) {
                event.preventDefault();
                var id = $(this).data('id');
                $.get('/pengguna/' + id + '/edit', function(data) {
                    // $('#modal-student-edit').modal('show');

                    $('#username-edit').val(data.users.username);
                    $('#name-edit').val(data.users.fullname);
                    $('#address-edit').val(data.users.address);
                    $('#phone-edit').val(data.users.phone);


                    $('#form-edit').attr('action', 'updateDataUser/' + data.users.id);

                })
            });

        });
    </script>
@endpush()

@section('content')
    <div class="pagetitle">

        <h1>Manajemen Pengguna</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Pengguna</li>

            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">

        @if ($errors->has('username') )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>

                <span class="fw-bold">Gagal Menyimpan: </span> Username <span class="text-secondary">
                    {{ $errors->first('username') }}</span> sudah digunakan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ( session()->has('username_sama'))
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
                                    class="bi bi-plus"></i> Tambah Pengguna</button>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatable table-hover">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">#</th> --}}
                                    <th scope="col">Username</th>
                                    <th scope="col">Posisi</th>
                                    {{-- <th scope="col">Telepon</th> --}}

                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $user)
                                    <tr>

                                        <td> <a href="/pengguna/{{ $user->id }}"
                                                class="text-primary ">{{ $user->username }}</a></td>
                                        <td><span
                                                class="badge rounded-pill {{ $user->role_id == '1' ? ' bg-primary ' : ($user->role_id == 2 || $user->role_id == 3 ? ' bg-danger ' : ' bg-warning ') }}">{{ $user->role->role }}</span>
                                        </td>
                                        {{-- <td>{{ $user->phone }}</td> --}}

                                        <td>
                                            <button type="button" class="btn btn-success edit-user btn-sm"
                                                data-bs-target="#editModal" data-id="{{ $user->id }}"
                                                data-bs-toggle="modal"><i class="bi bi-pencil-square"></i></button>

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
