<style>
  .main-sidebar {
    background-color: #6c63ff;
  }

  .brand-link {
    background-color: #6c63ff;
  }

  .brand-link .brand-image {
    border: none;
  }

  .brand-link .brand-text {
    color: #ffffff;
    font-size: 1.2rem;
  }

  .sidebar-search .form-control {
    background-color: #293462;
    color: #d3d9de;
    border-color: transparent;
  }

  .sidebar-search .btn-sidebar {
    background-color: #293462;
    color: #d3d9de;
  }

  .nav-sidebar .nav-link {
    color: #ffffff;
  }

  .nav-sidebar .nav-link:hover {
    color: #c3bdff;
  }

  .nav-sidebar .nav-icon {
    color: #c3bdff;
  }

  .nav-sidebar .right {
    color: #c3bdff;
  }
</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="{{ route('admin.dashboard') }}" class="brand-link mt-2">
    <img src="{{ asset('land/images/logo_glj.jpg') }}" alt="Logo" class="brand-image img-thumbnail elevation-3">
    <span class="brand-text font-weight-bold" style="font-size:medium;">PT. Gudang Lancar Jaya</span>
  </a>
  <div class="sidebar sidebar-content">
    <br>
    <div class="form-inline"> 
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar bg-white" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar" style="background-color: white;">
            <i class="fas fa-search fa-fw"  style="color: #6c63ff;"></i>
          </button>
        </div>
      </div>
    </div>


    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-solid fa-th-large"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.index') }}" class="nav-link">
            <i class="nav-icon fas fa-solid fa-users"></i>
            <p>
              Data Pengguna
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-database"></i>
            <p>
              Data Master
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('barang') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('detailbrg') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Detail Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('kategori') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('satuan') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Satuan Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('supplier.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Supplier</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-exchange-alt"></i>
            <p>
              Data Retur
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('retur.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Retur Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('detailretur.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Detail Retur</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('penggantianbarang.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Penggantian Barang</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-print"></i>
            <p>
              Laporan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('lapmasuk') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Barang Masuk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('lapkeluar') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Barang Keluar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('lapSupplier') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Data Supplier</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('lapretur') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Retur Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('lappenggantian') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Penggantian</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              {{ __('Logout') }}
            </p>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>