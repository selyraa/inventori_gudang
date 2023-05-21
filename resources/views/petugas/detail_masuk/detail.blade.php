@extends('petugas.app_petugas')
 @section('content')
 <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">Detail Data Barang Masuk</div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>ID Detail Masuk: </b>{{$detailmasuk->idDetailMasuk}}</li>
                <li class="list-group-item"><b>ID Transaksi Masuk: </b>{{$detailmasuk->idTransaksiMasuk}}</li>
                <li class="list-group-item"><b>ID Detail Barang: </b>{{$detailmasuk-> detailbarang ->idDetailBarang}}</li>
                <li class="list-group-item"><b>Jumlah: </b>{{$detailmasuk->jumlah}}</li>
            </ul>
        </div>
        <a class="btn btn-success mt-3" href="{{ route('detailmasuk.index') }}">Kembali</a>
    </div>
</div>
</div>
@endsection