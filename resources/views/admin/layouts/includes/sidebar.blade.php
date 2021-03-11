<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">{{ env("APP_NAME") }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ Auth::user()->profile_photo_url }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->nama }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="{{ route('admin.dashboard') }}" class="nav-link @if(request()->routeIs('admin.dashboard')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
            
          </li>

          @php
              $pengaturan = [Auth::user()->cek_akses('Group','Lihat'),Auth::user()->cek_akses('User','Lihat')];
          @endphp

          <li class="nav-item @if(request()->routeIs('admin.group.*') || request()->routeIs('admin.user.*')) menu-open @endif">
            <a href="#" class="nav-link @if(request()->routeIs('admin.group.*') || request()->routeIs('admin.user.*')) active @endif">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Pengaturan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if ($pengaturan[0])
                <li class="nav-item">
                  <a href="{{ route('admin.group.index') }}" class="nav-link @if(request()->routeIs('admin.group.*')) active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Group</p>
                  </a>
                </li>
              @endif

              @if ($pengaturan[1])
                <li class="nav-item">
                  <a href="{{ route('admin.user.index') }}" class="nav-link @if(request()->routeIs('admin.user.*')) active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User</p>
                  </a>
                </li>
              @endif

              <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault();
                jQuery(this).closest('ul').find('form').submit();">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
                <form method="POST" action="{{ route('logout') }}" style="display:none;">
                  @csrf
              </form>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>