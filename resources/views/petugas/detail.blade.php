@extends('petugas.app_petugas')
 @section('content')
 <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">Detail Petugas</div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>ID Petugas: </b>{{$petugas->idUser}}</li>
                <li class="list-group-item"><b>Nama: </b>{{$petugas->nama}}</li>
                <li class="list-group-item"><b>Umur: </b>{{$petugas->umur}}</li>
                <li class="list-group-item"><b>Alamat: </b>{{$petugas->alamat}}</li>
                <li class="list-group-item"><b>Username: </b>{{$petugas->username}}</li>
                <li class="list-group-item"><b>No Telepon: </b>{{$petugas->noTelp}}</li>
            </ul>
        </div>
        <a class="btn btn-success mt-3" href="{{ route('petugas.index') }}">Kembali</a>
    </div>
</div>
</div>
@endsection