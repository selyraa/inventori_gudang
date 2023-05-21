@extends('petugas.app_petugas')
 @section('content')
 <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">Detail Transaksi Barang Keluar</div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>ID Transaksi Keluar: </b>{{$trkeluar->$idTransaksiKeluar}}</li>
                <li class="list-group-item"><b>ID User: </b>{{$trkeluar->idUser}}</li>
                <li class="list-group-item"><b>ID Toko: </b>{{$trkeluar->idToko}}</li>
                <li class="list-group-item"><b>Tanggal Transaksi Keluar: </b>{{$trkeluar->tglTransaksiKeluar}}</li>
            </ul>
        </div>
        <a class="btn btn-success mt-3" href="{{ route('trkeluar.index') }}">Kembali</a>
    </div>
</div>
</div>
@endsection