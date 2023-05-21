@extends('petugas.app_petugas')
 @section('content')
 <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">Detail Data Barang</div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>ID Detail Barang: </b>{{$detailbrg->idDetailBarang}}</li>
                <li class="list-group-item"><b>ID Barang: </b>{{$detailbrg->idBarang}}</li>
                <!-- <li class="list-group-item"><b>ID Transaksi Masuk: </b>{{$detailbrg->idTransaksiMasuk}}</li> -->
                <li class="list-group-item"><b>Tanggal Produksi: </b>{{$detailbrg->tglProduksi}}</li>
                <li class="list-group-item"><b>Tanggal Expired: </b>{{$detailbrg->tglExp}}</li>
                <li class="list-group-item"><b>Harga Beli: </b>{{$detailbrg->hargaBeli}}</li>
                <li class="list-group-item"><b>Harga Jual: </b>{{$detailbrg->hargaJual}}</li>
                <li class="list-group-item"><b>Stok: </b>{{$detailbrg->stok}}</li>
            </ul>
        </div>
        <a class="btn btn-success mt-3" href="{{ route('detailbrg.index') }}">Kembali</a>
    </div>
</div>
</div>
@endsection