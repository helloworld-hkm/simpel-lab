<nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">




        <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

                <span class="d-none d-md-block dropdown-toggle ps-2">HI,{{ auth()->user()->username }}</span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                    <h6>{{ auth()->user()->username }}</h6>
                    <span>{{ auth()->user()->role->role }}</span>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="/profile">
                        <i class="bi bi-person"></i>
                        <span>Profile</span>
                    </a>
                </li>

                <li>
                    <div class=" d-flex align-items-center">
                        <form  action="/logout" method="post">
                            @csrf()
                            <button type="submit" class="dropdown-item" ><i class="bi bi-box-arrow-in-right"></i>
                                Logout</button>
                        </form>
                    </div>
                </li>


            </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

    </ul>
</nav>
