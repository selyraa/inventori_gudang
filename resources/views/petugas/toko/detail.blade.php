@extends('petugas.app_petugas')
 @section('content')
 <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">Detail Data Toko</div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>ID Toko: </b>{{$toko->idToko}}</li>
                <li class="list-group-item"><b>Nama Toko: </b>{{$toko->nama}}</li>
                <li class="list-group-item"><b>Alamat Toko: </b>{{$toko->alamat}}</li>
                <li class="list-group-item"><b>No Telp: </b>{{$toko->noTelp}}</li>
            </ul>
        </div>
        <a class="btn btn-success mt-3" href="{{ route('toko.index') }}">Kembali</a>
    </div>
</div>
</div>
@endsection