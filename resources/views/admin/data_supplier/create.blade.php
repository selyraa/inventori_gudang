@extends('admin.app')
@section('content')
<div class="container mt-5">
   <div class="row justify-content-center align-items-center" style ="color:black;">
   <div class="card" style="width: 24rem;">
   <div class="card-header">Tambah Supplier</div>
   
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
      
      <form method="post" action="{{ route('supplier.store') }}" id="myForm">
         @csrf
         <div class="form-group">
            <label for="idSupplier">ID Supplier</label> 
            <input type="text" name="idSupplier" class="form-control" id="idSupplier" aria-describedby="idSupplier" > 
         </div>
         <div class="form-group">
            <label for="nama">Nama Supplier</label> 
            <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" > 
         </div>
         <div class="form-group">
            <label for="alamat">Alamat</label> 
            <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat" > 
         </div>
         <div class="form-group">
            <label for=" noTelp">No Telepon</label> 
            <input type="text" name="noTelp" class="form-control" id="noTelp" aria-describedby="noTelp" > 
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>
      </form>
   </div>
</div>
</div>
</div>
@endsection