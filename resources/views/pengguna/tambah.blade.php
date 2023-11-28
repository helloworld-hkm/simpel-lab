@extends('templates.index')
@section('content')
    <div class="pagetitle">
        <h1>Tambah Pengguna</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item "><a href="/pengguna">Pengguna</a></li>
                <li class="breadcrumb-item active">Tambah</li>

            </ol>
        </nav>
    </div><!-- End Page Title -->


    <section class="section">
        <div class="row">
            <div class="col-lg-8">

                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">Form tambah pengguna</h5>

                        <!-- Floating Labels Form -->
                        <form class="row g-3 needs-validation" action="/pengguna" method="post" novalidate>
                            @csrf()
                            <div class="col-12">
                                <div class="form-floating has-validation">
                                    <input type="text" class="form-control" name="username" id="floatingName"
                                        placeholder="Your Name" required>
                                    <label for="floatingName">Username</label>
                                    <div class="invalid-feedback">
                                        Silahkan isi Username
                                    </div>
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="form-floating has-validation">
                                    <input type="text" class="form-control" name="fullname" id="floatingFullName"
                                        placeholder="Your Name" required>
                                    <label for="floatingFullName">Nama Lengkap</label>
                                    <div class="invalid-feedback">
                                        Silahkan isi Nama Lengkap
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating has-validation">
                                    <input type="text" class="form-control" name="phone" id="floatingFullName"
                                        placeholder="Your Name" required>
                                    <label for="floatingFullName">Telepon</label>
                                    <div class="invalid-feedback">
                                        Silahkan isi Nomor Telepon
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating has-validation">
                                    <input type="text" class="form-control" name="password" id="floatingPassword"
                                        placeholder="Password" required>
                                    <label for="floatingPassword">Password</label>
                                    <div class="invalid-feedback">
                                        Password harus diisi!
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3 has-validation">
                                    <select class="form-select" name="role_id" id="floatingSelect" aria-label="State"
                                        required>

                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->role }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Role</label>
                                    <div class="invalid-feedback">
                                        Silahkan isi Role
                                    </div>
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="form-floating has-validation">
                                    <textarea class="form-control" placeholder="Address" name="address" id="floatingTextarea" style="height: 100px;"
                                        required></textarea>
                                    <label for="floatingTextarea">Alamat</label>
                                    <div class="invalid-feedback">
                                        Silahkan isi Alamat
                                    </div>
                                </div>
                            </div>
                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Simpan</button>

                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
        </div>
    </section>
@endsection
