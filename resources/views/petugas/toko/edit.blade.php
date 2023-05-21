@extends('petugas.app_petugas')
 @section('content')
 <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">Edit Data Toko</div>
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
            <form method="post" action="{{ route('toko.update', $toko->idToko) }}" id="myForm">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="idToko">ID Toko</label> 
                    <input type="text" name="idToko" class="form-control" id="idToko" value="{{ old('idToko', $toko->idToko) }}" aria-describedby="idToko" > 
                </div>
                <div class="form-group">
                    <label for="nama">Nama Toko</label> 
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $toko->nama) }}" aria-describedby="nama" > 
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Toko</label> 
                    <input type="text" name="alamat" class="form-control" id="alamat" value="{{ old('alamat', $toko->alamat) }}" aria-describedby="alamat" > 
                </div>
                <div class="form-group">
                    <label for="noTelp">No Telp</label> 
                    <input type="text" name="noTelp" class="form-control" id="noTelp" value="{{ old('noTelp', $toko->noTelp) }}" aria-describedby="noTelp" > 
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection