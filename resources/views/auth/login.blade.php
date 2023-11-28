@extends('auth.templates.index')
@section('content')
<main>
    <div class="container">

        <section
            class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class=" d-flex align-items-center w-auto">
                                <img src="{{ asset('assets/img/logo2x.png') }}" width="240" alt="">

                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">
                            @if (session()->has('loginError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-octagon me-1"></i>
                               {{ session('loginError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                            @endif

                            <div class="card-body">
                                <div class=" pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">SMK N 01 Sragi</h5>
                                    <p class="text-center small">SISTEM INFORMASI MANAJEMEN PEMELIHARAAN LAB KOMPUTER
                                    </p>
                                </div>

                                <form class="row g-3 needs-validation" action="/login" method="post" novalidate>
                                    @csrf
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
                                            <input type="password" class="form-control" name="password" id="floatingPassword"
                                                placeholder="Password" required>
                                            <label for="floatingPassword">Password</label>
                                            <div class="invalid-feedback">
                                                Password harus diisi!
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>

                                </form>

                            </div>
                        </div>

                        <div class="credits">
                            <!-- All the links in the footer should remain intact. -->
                            <!-- You can delete the links only if you purchased the pro version. -->
                            <!-- Licensing information: https://bootstrapmade.com/license/ -->
                            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                            Dikembangkan oleh <a href="https://github.com/helloworld-hkm">Hakim Firman F.</a>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->

@endsection
