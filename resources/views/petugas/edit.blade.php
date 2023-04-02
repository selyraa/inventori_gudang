@extends('petugas.app_petugas')
 @section('content')
 <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">Edit Petugas</div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="post" action="{{ route('petugas.update', $petugas->idUser) }}" id="myForm">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="idUser">ID Petugas</label> 
                    <input type="text" name="idUser" class="form-control" id="idUser" value="{{ $petugas->idUser }}" aria-describedby="idUser" > 
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label> 
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ $petugas->nama }}" aria-describedby="nama" > 
                </div>
                <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="text" name="umur" class="form-control" id="umur" value="{{ $petugas->umur }}" aria-describedby="umur" > 
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label> 
                    <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $petugas->alamat }}" aria-describedby="alamat" > 
                </div>
                <div class="form-group">
                    <label for="username">Username</label> 
                    <input type="text" name="username" class="form-control" id="username" value="{{ $petugas->username }}" aria-describedby="username" > 
                </div>
                <div class="form-group">
                    <label for="password">Password</label> 
                    <input type="password" name="password" class="form-control" id="password" value="{{ $petugas->password }}" aria-describedby="password" > 
                </div>
                <div class="form-group">
                    <label for="noTelp">No Telepon</label> 
                    <input type="text" name="noTelp" class="form-control" id="noTelp" value="{{ $petugas->noTelp }}" aria-describedby="noTelp" > 
                </div>
                <div class="form-group">
                    <label for="role">Role</label> 
                    <input type="text" name="role" class="form-control" id="role" value="{{ $petugas->role }}" aria-describedby="role" > 
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection