@extends('petugas.app_petugas')
 @section('content')
 <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">Detail Data Barang Keluar</div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>ID Detail Keluar: </b>{{$detailkeluar->idDetailKeluar}}</li>
                <li class="list-group-item"><b>ID Transaksi Keluar: </b>{{$detailkeluar->idTransaksiKeluar}}</li>
                <li class="list-group-item"><b>ID Detail Barang: </b>{{$detailkeluar->idDetailBarang}}</li>
                <li class="list-group-item"><b>Jumlah: </b>{{$detailkeluar->jumlah}}</li>
            </ul>
        </div>
        <a class="btn btn-success mt-3" href="{{ route('detailkeluar.index') }}">Kembali</a>
    </div>
</div>
</div>
@endsection