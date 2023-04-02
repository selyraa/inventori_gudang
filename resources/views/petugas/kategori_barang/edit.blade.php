@extends('petugas.app_petugas')
 @section('content')
 <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">Edit Kategori Barang</div>
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
            <form method="post" action="{{ route('kategori.update', $kategori->idKategori) }}" id="myForm">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="idKategori">ID Kategori Barang</label> 
                    <input type="text" name="idKategori" class="form-control" id="idKategori" value="{{ $kategori->idKategori }}" aria-describedby="idKategori" > 
                </div>
                <div class="form-group">
                    <label for="namaKategori">Nama Kategori Barang</label> 
                    <input type="text" name="namaKategori" class="form-control" id="namaKategori" value="{{ $kategori->namaKategori }}" aria-describedby="namaKategori" > 
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection