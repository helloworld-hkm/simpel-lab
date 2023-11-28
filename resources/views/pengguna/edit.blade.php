@extends('templates.index')
@section('content')
    <div class="pagetitle">
        <h1>Edit Pengguna</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item "><a href="/pengguna">Pengguna</a></li>
                <li class="breadcrumb-item active">Edit</li>

            </ol>
        </nav>
    </div><!-- End Page Title -->


    <section class="section">
        <div class="row">
            <div class="col-lg-8">

                <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Form Edit Pengguna</h5>

                            <!-- Floating Labels Form -->
                            <form class="row g-3" action="/pengguna" method="post">
                                @csrf()
                              <div class="col-12">
                                <div class="form-floating">
                                  <input type="text" class="form-control" name="username" id="floatingName" placeholder="Your Name">
                                  <label for="floatingName">Username</label>
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="form-floating">
                                  <input type="text" class="form-control" name="fullname" id="floatingFullName" placeholder="Your Name">
                                  <label for="floatingFullName">Nama Lengkap</label>
                                </div>
                              </div>

                              <div class="col-12">
                                <div class="form-floating">
                                  <input type="text" class="form-control" name="phone" id="floatingFullName" placeholder="Your Name">
                                  <label for="floatingFullName">Telepon</label>
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="form-floating">
                                  <input type="text" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                                  <label for="floatingPassword">Password</label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-floating mb-3">
                                  <select class="form-select" name="role_id" id="floatingSelect" aria-label="State">

                                    <option value="1">Admin</option>
                                    <option value="2">Kepala Program keahlian</option>
                                    <option value="3" selected>Maintenance & Repair</option>
                                  </select>
                                  <label for="floatingSelect">Role</label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-floating mb-3">
                                  <select class="form-select" name="jurusan" id="floatingSelect" aria-label="State" >

                                    <option value="-" selecterd>-</option>
                                    <option value="TKJ">TKJ</option>
                                    <option value="AKKL" >AKKL</option>
                                  </select>
                                  <label for="floatingSelect">Jurusan</label>
                                </div>
                              </div>


                              <div class="col-12">
                                <div class="form-floating">
                                  <textarea class="form-control" placeholder="Address" name="address" id="floatingTextarea" style="height: 100px;"></textarea>
                                  <label for="floatingTextarea">Alamat</label>
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
