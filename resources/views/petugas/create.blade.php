@extends('petugas.app_petugas')
@section('content')
<div class="container mt-5">
   <div class="row justify-content-center align-items-center">
   <div class="card" style="width: 24rem;">
   <div class="card-header">Tambah Petugas</div>
   
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
      
      <form method="post" action="{{ route('petugas.store') }}" id="myForm">
         @csrf
         <div class="form-group">
            <label for="idUser">ID Petugas</label> 
            <input type="text" name="idUser" class="form-control" id="idUser" aria-describedby="idUser" > 
         </div>
         <div class="form-group">
            <label for="nama">Nama</label> 
            <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" > 
         </div>
         <div class="form-group">
            <label for="umur">Umur</label> 
            <input type="text" name="umur" class="form-control" id="umur" aria-describedby="umur" > 
         </div>
         <div class="form-group">
            <label for="alamat">Alamat</label> 
            <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat" > 
         </div>
         <div class="form-group">
            <label for="username">Username</label> 
            <input type="text" name="username" class="form-control" id="username" aria-describedby="username" > 
         </div>
         <div class="form-group">
            <label for="password">Password</label> 
            <input type="password" name="password" class="form-control" id="password" aria-describedby="password" > 
         </div>
         <div class="form-group">
            <label for=" noTelp">No Telepon</label> 
            <input type="text" name="noTelp" class="form-control" id="noTelp" aria-describedby="noTelp" > 
         </div>
         <div class="form-group">
            <label for=" role">Role</label> 
            <input type="text" name="role" class="form-control" id="role" aria-describedby="role" > 
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>
      </form>
   </div>
</div>
</div>
</div>
@endsection