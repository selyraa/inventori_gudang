@extends('admin.app')
@section('content')
<style>
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
        margin-bottom: 10px;
        list-style-type: none;
        padding: 0;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination li a {
        display: block;
        padding: 8px 12px;
        text-decoration: none;
        color: #fff;
        background-color: #6c63ff;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .pagination li a:hover {
        background-color: #a892ff;
    }

    .pagination .active a {
        background-color: #a892ff;
    }
</style>
<section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section>
<section>
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title font-weight-bold" style="margin-top:15px; color:black; font-size: 24px; font-family:'Helvetica Neue', sans-serif;">Laporan Barang Masuk</h3><br>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row mt-4">
                <div class="col-auto">
                    <form method="post" action="{{ route('lapmasuk') }}" class="form-inline" id="form-filter">
                        @csrf
                        <input type="date" name="tgl_mulai" class="form-control" placeholder="Tanggal Mulai">
                        <input type="date" name="tgl_selesai" class="form-control ml-3" placeholder="Tanggal Selesai">
                        <button type="submit" name="filter_tgl" class="btn btn-info ml-3">Filter</button>
                    </form>
                </div>
                <div class="col-auto">
                    <form method="get" action="{{ route('export_lapmasuk') }}" class="form-inline" id="form-export">
                        @csrf
                        <input type="hidden" name="tgl_mulai" value="{{ session('tgl_mulai') }}">
                        <input type="hidden" name="tgl_selesai" value="{{ session('tgl_selesai') }}">
                        <button type="submit" name="filter_tgl" class="btn btn-info">Export Data</button>
                    </form>
                </div>
                <div class="col-auto">
                    <form method="post" action="{{ route('lapmasuk') }}" class="form-inline" id="form-reset">
                        @csrf
                        <button type="submit" name="reset_filter" class="btn btn-info">Reset</button>
                    </form>
                </div>
            </div>
            <br>
            <table class="table table-hover table-bordered" style="color:white;">
                <thead style="background: linear-gradient(to right, #6c63ff, #a892ff); color:white; ">
                    <tr>
                        <th>ID Trans Masuk</th>
                        <th>Tgl Masuk</th>
                        <th>Nama Petugas</th>
                        <th>Nama Supplier</th>
                        <th>Nama Barang</th>
                        <th>Tgl Produksi</th>
                        <th>Tgl Expired</th>
                        <th>Harga Satuan</th>
                        <!-- <th>Harga Jual</th> -->
                        <th>Jumlah Masuk</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody style="color: black;">
                    <?php
                    if ($mulai = null || $selesai = null) {
                    ?>
                        @foreach($filter as $lm)
                        <tr>
                            <td>{{ $lm -> idTransaksiMasuk}}</td>
                            <td>{{ $lm -> tglTransaksiMasuk}}</td>
                            <td>{{ $lm -> namaPetugas}}</td>
                            <td>{{ $lm -> nama}}</td>
                            <td>{{ $lm -> namaBarang}}</td>
                            <td>{{ $lm -> tglProduksi}}</td>
                            <td>{{ $lm -> tglExp}}</td>
                            <td>Rp. {{ number_format($lm -> hargaBeli, 0, ',', '.') }}</td>
                            <td>{{ $lm -> stok}}</td>
                            <!-- <td>{{ $lm -> hargaJual}}</td> -->
                            <td>Rp. {{ number_format($lm -> totalHarga, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    <?php
                    }
                    if (isset($_POST['filter_tgl'])) {
                    ?>
                        @foreach($filter as $lm)
                        <tr>
                            <td>{{ $lm -> idTransaksiMasuk}}</td>
                            <td>{{ $lm -> tglTransaksiMasuk}}</td>
                            <td>{{ $lm -> namaPetugas}}</td>
                            <td>{{ $lm -> nama}}</td>
                            <td>{{ $lm -> namaBarang}}</td>
                            <td>{{ $lm -> tglProduksi}}</td>
                            <td>{{ $lm -> tglExp}}</td>
                            <td>Rp. {{ number_format($lm -> hargaBeli, 0, ',', '.') }}</td>
                            <td>{{ $lm -> stok}}</td>
                            <!-- <td>{{ $lm -> hargaJual}}</td> -->
                            <td>Rp. {{ number_format($lm -> totalHarga, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    <?php
                    } else {
                    ?>
                        @foreach($laporanPaginator as $lm)
                        <tr>
                            <td>{{ $lm -> idTransaksiMasuk}}</td>
                            <td>{{ $lm -> tglTransaksiMasuk}}</td>
                            <td>{{ $lm -> namaPetugas}}</td>
                            <td>{{ $lm -> nama}}</td>
                            <td>{{ $lm -> namaBarang}}</td>
                            <td>{{ $lm -> tglProduksi}}</td>
                            <td>{{ $lm -> tglExp}}</td>
                            <td>Rp. {{ number_format($lm -> hargaBeli, 0, ',', '.') }}</td>
                            <td>{{ $lm -> stok}}</td>
                            <!-- <td>{{ $lm -> hargaJual}}</td> -->
                            <td>Rp. {{ number_format($lm -> totalHarga, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<div class="col-md-12">
    <ul class="pagination">
        {{ $laporanPaginator->links() }}
    </ul>
</div>
@endsection