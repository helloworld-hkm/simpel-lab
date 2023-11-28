<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ $active==='dashboard'?' ':'collapsed' }}" href="/">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-heading">Master</li>
      @can('admin')
      <li class="nav-item">
        <a class="nav-link {{ $active==='lab'?' ':'collapsed' }}" href="/lab">
          <i class="bi bi-door-open"></i>
          <span class="ml-5">Laboratorium </span>

        </a>
      </li>
      @endcan
      @can('maintenanceRepair')
      <li class="nav-item">
        <a class="nav-link {{ $active==='hardware'?' ':'collapsed' }}" href="/hardware">
          <i class="bi bi-menu-button-wide"></i>
          <span>Hardware</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $active==='software'?' ':'collapsed' }}" href="/software">
          <i class="bi bi-code-square"></i>
          <span>Software</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $active==='prosedur'?' ':'collapsed' }}" href="/prosedur">
          <i class="bi bi-clipboard-check"></i>
          <span>Prosedur Pemeliharaan</span>
        </a>
      </li>
      @endcan
      <li class="nav-heading">Manajemen</li>
      @can('admin')
      <li class="nav-item">
        <a class="nav-link {{ $active === 'pengguna' ? ' ' : 'collapsed' }}" href="/pengguna">
          <i class="bi bi-people "></i>
          <span>Pengguna</span>
        </a>
      </li>
      @endcan
      <li class="nav-item">
        <a class="nav-link {{ $active==='monitoring'?' ':'collapsed' }}  " href="/monitoring">
          <i class="bi bi-pc-display"></i>
          <span>Monitoring</span>
        </a>
      </li>
      @can('maintenanceRepair')
      <li class="nav-item">
        <a class="nav-link {{ $active==='komputer'?' ':'collapsed' }}  " href="/komputer">
          <i class="bi bi-pc-display"></i>
          <span>Komputer</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $active==='aset'?' ':'collapsed' }}" href="/aset">
          <i class="bi bi-archive"></i>
          <span>Aset Lab </span>
        </a>
      </li>
      <li class="nav-heading">Pemeliharaan & Perbaikan  </li>
      <li class="nav-item">
        <a class="nav-link {{ $active==='pemeliharaan'?' ':'collapsed' }}  " href="/pemeliharaan">
          <i class="bi bi-journal-check"></i>
          <span>Pemeliharaan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $active==='perbaikan'?' ':'collapsed' }} d-flex justify-content-between  " href="/perbaikan">
            <div>
                <i class="bi bi-database-exclamation"></i>
                <span>Perbaikan</span>
            </div>

          @if ($perbaikanCount)
          <span class="mx-2 badge bg-primary text-white"> {{ $perbaikanCount }} </span>
          @endif
        </a>
      </li>
      @endcan
      <li class="nav-heading">Laporan  </li>
      <li class="nav-item">
        <a class="nav-link collapsed  " href="users-profile.html">
          <i class="bi bi-filetype-pdf"></i>
          <span>Laporan</span>
        </a>
      </li>




    </ul>

  </aside><!-- End Sidebar-->
