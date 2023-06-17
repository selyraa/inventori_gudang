<style>
  .main-sidebar {
    background: linear-gradient(to bottom, #2D7FC1, #007bff);
  }

  .brand-link {
    background-color: #2D7FC1;
  }

  .brand-link .brand-image {
    border: none;
  }

  .brand-link .brand-text {
    color: #d3d9de;
    font-size: 1.2rem;
  }

  .sidebar-search .form-control {
    background: linear-gradient(to bottom, #293462, #1e2838);
    color: #d3d9de;
    border-color: transparent;
  }

  .sidebar-search .btn-sidebar {
    background: linear-gradient(to bottom, #293462, #1e2838);
    color: #d3d9de;
  }

  .nav-sidebar .nav-link {
    color: #d3d9de;
  }

  .nav-sidebar .nav-link:hover {
    color: #19A7CE;
  }

  .nav-sidebar .nav-icon {
    color: #adb5bd;
  }

  .nav-sidebar .right {
    color: #adb5bd;
  }
</style>


<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="{{ route('petugas.dashboard') }}" class="brand-link mt-2">
    <img src="{{ asset('land/images/logo_glj.jpg') }}" alt="Logo" class="brand-image img-thumbnail elevation-3">
    <span class="brand-text font-weight-bold" style="font-size:medium;">PT. Gudang Lancar Jaya</span>
  </a>

  <div class="sidebar">
    <br>
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar bg-white" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar" style="background-color: white;">
            <i class="fas fa-search fa-fw"  style="color: #2D7FC1;"></i>
          </button>
        </div>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('petugas.dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-solid fa-th-large"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('petugas.index') }}" class="nav-link">
            <i class="nav-icon fas fa-solid fa-user"></i>
            <p>
              Data Petugas
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-server"></i>
            <p>
              Data Master
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('barang.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('detailbrg.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Detail Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('kategori.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('satuan.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Satuan Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('toko.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Toko</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-wallet"></i>
            <p>
              Transaksi
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('trmasuk.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Barang Masuk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('trkeluar.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Barang Keluar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('detailmasuk.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Detail Barang Masuk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('detailkeluar.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Detail Barang Keluar</p>
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