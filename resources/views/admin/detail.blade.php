@extends('admin.app')
 @section('content')
 <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">Detail User</div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>ID User: </b>{{$admin->idUser}}</li>
                <li class="list-group-item"><b>Nama: </b>{{$admin->nama}}</li>
                <li class="list-group-item"><b>Umur: </b>{{$admin->umur}}</li>
                <li class="list-group-item"><b>Alamat: </b>{{$admin->alamat}}</li>
                <li class="list-group-item"><b>Username: </b>{{$admin->username}}</li>
                <li class="list-group-item"><b>No Telepon: </b>{{$admin->noTelp}}</li>
            </ul>
        </div>
        <a class="btn btn-success mt-3" href="{{ route('admin.index') }}">Kembali</a>
    </div>
</div>
</div>
@endsection