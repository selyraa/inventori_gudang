@extends('petugas.app_petugas')
@section('content')
<div class="container mt-5">
   <div class="row justify-content-center align-items-center">
   <div class="card" style="width: 24rem;">
   <div class="card-header">Tambah Data Barang</div>
   
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
      
      <form method="post" action="{{ route('barang.store') }}" id="myForm" enctype="multipart/form-data">
         @csrf
         <div class="form-group">
            <label for="idBarang">ID Barang</label> 
            <input type="text" name="idBarang" class="form-control" id="idBarang" aria-describedby="idBarang" > 
         </div>
         <div class="form-group">
            <label for="idSupplier">ID Supplier</label> 
            <select name="idSupplier" class="form-control">
                @foreach($supplier as $s)
                    <option value="{{ $s -> idSupplier }}">{{ $s -> nama }}</option>
                @endforeach
            </select>
         </div>
         <div class="form-group">
            <label for="idUser">ID User</label> 
            <select name="idUser" class="form-control">
                @foreach($user as $u)
                    <option value="{{ $u -> idUser }}">{{ $u -> username }}</option>
                @endforeach
            </select> 
         </div>
         <div class="form-group">
            <label for="idSatuan">ID Satuan</label> 
            <select name="idSatuan" class="form-control">
                @foreach($satuan as $s)
                    <option value="{{ $s -> idSatuan }}">{{ $s -> namaSatuan }}</option>
                @endforeach
            </select> 
         </div>
         <div class="form-group">
            <label for="idKategori">ID Kategori</label> 
            <select name="idKategori" class="form-control">
                @foreach($kategori as $k)
                    <option value="{{ $k -> idKategori }}">{{ $k -> namaKategori }}</option>
                @endforeach
            </select> 
         </div>
         <div class="form-group">
            <label for="namaBarang">Nama Barang</label> 
            <input type="text" name="namaBarang" class="form-control" id="namaBarang" aria-describedby="namaBarang" > 
         </div>
         <div class="form-group">
            <label for="fotoProduk">Foto Produk</label> 
            <input type="file" name="fotoProduk" class="form-control" id="fotoProduk" aria-describedby="fotoProduk" > 
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>
      </form>
   </div>
</div>
</div>
</div>
@endsection