<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-purple elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('adminlte')}}/dist/img/IBI.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Klinik Bidan Endang</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              
        @hasrole('admin')
          <li class="nav-header">ADMIN</li>



          <li class="nav-item">
            <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
              <i class="fas fa-chart-line"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/users" class="nav-link {{ Request::is('users') ? 'active' : '' }}">
              <i class="fas fa-users-cog"></i>
              <p>
                Users Management
              </p>
            </a>
          </li>
          @endhasrole
          @hasrole('admin|user')
        <li class="nav-header">PENANGANAN</li>          

        <li class="nav-item">
          <a href="/pasien" class="nav-link {{ Request::path() === 'pasien' ? 'active' : '' }}">
            <i class="fas fa-hospital-user"></i>
            <p>
              Pasien
            </p>
          </a>
        </li>

            <li class="nav-item has-treeview {{ Request::is(['persalinan','kb','imunisasi','pemeriksaan']) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is(['persalinan','kb','imunisasi','pemeriksaan']) ? 'active' : '' }}">
              <i class="fas fa-table"></i>
              <p>
                Table
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/persalinan" class="nav-link {{ Request::is('persalinan') ? 'active' : '' }}">
                  <i class="nav-icon fas fas fa-procedures"></i>
                  <p>Persalinan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/imunisasi" class="nav-link {{ Request::is('imunisasi') ? 'active' : '' }}">
                  <i class="fas fa-syringe"></i>
                  <p>Imunisasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/kb" class="nav-link {{ Request::is('kb') ? 'active' : '' }}">
                  <i class="fas fa-pills"></i>
                  <p>KB</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/pemeriksaan" class="nav-link {{ Request::is('pemeriksaan') ? 'active' : '' }}">
                  <i class="fas fa-baby"></i>
                  <p>Periksa Kehamilan</p>
                </a>
              </li>
            </ul>
            @endhasrole
          </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>