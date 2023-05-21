@extends('petugas.app_petugas')
 @section('content')
 <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">Detail Transaksi Barang Masuk</div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>ID Transaksi Masuk: </b>{{$trmasuk->idTransaksiMasuk}}</li>
                <li class="list-group-item"><b>ID User: </b>{{$trmasuk->idUser}}</li>
                <li class="list-group-item"><b>ID Supplier: </b>{{$trmasuk->idSupplier}}</li>
                <li class="list-group-item"><b>Tanggal Transaksi Masuk: </b>{{$trmasuk->tglTransaksiMasuk}}</li>
            </ul>
        </div>
        <a class="btn btn-success mt-3" href="{{ route('trmasuk.index') }}">Kembali</a>
    </div>
</div>
</div>
@endsection