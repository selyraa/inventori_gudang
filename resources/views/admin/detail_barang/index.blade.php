@extends('admin.app')
@section('content')
<head>
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
</head>
<section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <!-- Default box -->
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
            <div class="table-responsive">
                <table class="table table-hover">
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
                            <td>
                                {{ $db -> idBarang}}
                                <br>
                                @if($db->barang)
                                <p style="font-weight: bold; font-size: 17px;">{{ $db->barang->namaBarang }}</p>
                                @endif
                            </td>
                            </td>
                            <!-- <td>{{ $db -> idTransaksiMasuk}}</td> -->
                            <td>{{ $db -> tglProduksi}}</td>
                            <td>{{ $db -> tglExp}}</td>
                            <td>Rp. {{ number_format($db -> hargaBeli, 0, ',', '.') }}</td>
                            <td>Rp. {{ number_format($db -> hargaJual, 0, ',', '.') }}</td>
                            <td>
                                {{ $db -> stok}}
                                @if($db->barang)
                                <p style="font-weight: bold; font-size: 17px;">{{ $db->barang->satuan->namaSatuan }}</p>
                                @endif
                            </td>
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