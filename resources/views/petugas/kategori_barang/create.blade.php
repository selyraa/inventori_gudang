@extends('petugas.app_petugas')
@section('content')
<div class="container mt-5">
   <div class="row justify-content-center align-items-center">
   <div class="card" style="width: 24rem;">
   <div class="card-header">Tambah Kategori Barang</div>
   
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
      
      <form method="post" action="{{ route('kategori.store') }}" id="myForm">
         @csrf
         <div class="form-group">
            <label for="idKategori">ID Kategori</label> 
            <input type="text" name="idKategori" class="form-control" id="idKategori" aria-describedby="idKategori" > 
         </div>
         <div class="form-group">
            <label for="namaKategori">Nama Kategori</label> 
            <input type="text" name="namaKategori" class="form-control" id="namaKategori" aria-describedby="namaKategori" > 
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>
      </form>
   </div>
</div>
</div>
</div>
@endsection