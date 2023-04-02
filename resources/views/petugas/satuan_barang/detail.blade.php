@extends('petugas.app_petugas')
 @section('content')
 <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">Detail Satuan Barang</div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>ID Satuan: </b>{{$satuan->idSatuan}}</li>
                <li class="list-group-item"><b>Nama Satuan: </b>{{$satuan->namaSatuan}}</li>
            </ul>
        </div>
        <a class="btn btn-success mt-3" href="{{ route('satuan.index') }}">Kembali</a>
    </div>
</div>
</div>
@endsection