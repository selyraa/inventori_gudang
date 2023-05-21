@extends('petugas.app_petugas')
@section('content')
<div class="col-md-12 d-flex flex-row justify-content-end">
    <a class="btn rounded-pill" style="background-color: #0A4D68; color: white; padding: 12px 16px; font-size: 24px; margin-left: -8px;" href="{{ route('detailbrg.create') }}">
        <i class="fas fa-plus"></i>
    </a>
</div>
<section class="content-header">
    <div class="container-fluid">
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title font-weight-bold" style="margin-top:15px;">Detail Barang</h3><br>
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
            <table class="table table-hover table-bordered">
                <thead style="background-color:#19A7CE; color:white;">
                    <tr>
                        <th>ID Detail Barang</th>
                        <th>ID Barang</th>
                        <!-- <th>ID Transaksi Masuk</th> -->
                        <th>Tanggal Produksi</th>
                        <th>Tanggal Expired</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detailbrg as $db)
                    <tr>
                        <td>{{ $db -> idDetailBarang}}</td>
                        <td>{{ $db -> idBarang}}</td>
                        <!-- <td>{{ $db -> idTransaksiMasuk}}</td> -->
                        <td>{{ $db -> tglProduksi}}</td>
                        <td>{{ $db -> tglExp}}</td>
                        <td>{{ $db -> hargaBeli}}</td>
                        <td>{{ $db -> hargaJual}}</td>
                        <td>{{ $db -> stok}}</td>
                        <td>
                            <form action="{{ route('detailbrg.destroy',$db->idDetailBarang) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('detailbrg.show',$db->idDetailBarang) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('detailbrg.edit',$db->idDetailBarang) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection