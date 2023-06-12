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

    /* Styling untuk tabel */
    .table {
        color: black;
        font-size: 14px;
    }

    .table thead {
        background: linear-gradient(to right, #6c63ff, #a892ff);
        color: white;
    }

    .table th,
    .table td {
        padding: 10px;
        text-align: center;
    }
</style>
<section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title font-weight-bold" style="margin-top:15px; color:black; font-size: 24px; font-family:'Helvetica Neue', sans-serif;">Detail Barang</h3><br>
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
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>ID Detail Barang</th>
                            <th>ID Barang</th>
                            <th>Tanggal Produksi</th>
                            <th>Tanggal Expired</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($adminDetailBrg as $db)
                        <tr>
                            <td>{{ $db -> idDetailBarang}}</td>
                            <td>{{ $db -> idBarang}}</td>
                            <!-- <td>{{ $db -> idTransaksiMasuk}}</td> -->
                            <td>{{ $db -> tglProduksi}}</td>
                            <td>{{ $db -> tglExp}}</td>
                            <td>Rp. {{ number_format($db -> hargaBeli, 0, ',', '.') }}</td>
                            <td>Rp. {{ number_format($db -> hargaJual, 0, ',', '.') }}</td>
                            <td>{{ $db -> stok}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<div class="col-md-12">
    <ul class="pagination">
        {{ $adminDetailBrg->links() }}
    </ul>
</div>
@endsection
