@extends('admin.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title font-weight-bold" style="margin-top:15px; color:black;">Laporan Barang Masuk</h3><br>
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
            <br>
            <div class="row mt-4">
                <div class="col">
                    <form method="post" action="{{ route('lapmasuk') }}" class="form-inline">
                        @csrf
                        <input type="date" name="tgl_mulai" class="form-control">
                        <input type="date" name="tgl_selesai" class="form-control ml-3">
                        <button type="submit" name="filter_tgl" class="btn btn-info ml-3">Filter</button>
                    </form>
                </div>
            </div>
            <br>
            <table class="table table-hover table-bordered" style="color:black;">
                <thead class="thead-dark">
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
                <tbody>
                    <?php
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
                            <td>{{ $lm -> hargaBeli}}</td>
                            <td>{{ $lm -> stok}}</td>
                            <!-- <td>{{ $lm -> hargaJual}}</td> -->
                            <td>{{ $lm -> totalHarga}}</td>
                        </tr>
                        @endforeach
                    <?php
                    } else {
                        ?>
                        @foreach($laporan as $lm)
                        <tr>
                            <td>{{ $lm -> idTransaksiMasuk}}</td>
                            <td>{{ $lm -> tglTransaksiMasuk}}</td>
                            <td>{{ $lm -> namaPetugas}}</td>
                            <td>{{ $lm -> nama}}</td>
                            <td>{{ $lm -> namaBarang}}</td>
                            <td>{{ $lm -> tglProduksi}}</td>
                            <td>{{ $lm -> tglExp}}</td>
                            <td>{{ $lm -> hargaBeli}}</td>
                            <td>{{ $lm -> stok}}</td>
                            <!-- <td>{{ $lm -> hargaJual}}</td> -->
                            <td>{{ $lm -> totalHarga}}</td>
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
@endsection