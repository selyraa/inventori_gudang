@extends('petugas.app_petugas')
@section('content')
<div class="container mt-5">
   <div class="row justify-content-center align-items-center">
   <div class="card" style="width: 24rem;">
   <div class="card-header">Tambah Transaksi Barang Masuk</div>
   
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
      
      <form method="post" action="{{ route('trmasuk.store') }}" id="myForm">
         @csrf
         <div class="form-group">
            <label for="idTransaksiMasuk">ID Transaksi Masuk</label> 
            <input type="text" name="idTransaksiMasuk" class="form-control" id="idTransaksiMasuk" aria-describedby="idTransaksiMasuk" > 
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
            <label for="idSupplier">ID Supplier</label> 
            <select name="idSupplier" class="form-control">
                @foreach($supplier as $s)
                    <option value="{{ $s -> idSupplier }}">{{ $s -> nama }}</option>
                @endforeach
            </select>
         </div>
         <div class="form-group">
            <label for="tglTransaksiMasuk">Tanggal Transaksi Masuk</label> 
            <input type="date" name="tglTransaksiMasuk" class="form-control" id="tglTransaksiMasuk" aria-describedby="tglTransaksiMasuk" > 
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>
      </form>
   </div>
</div>
</div>
</div>
@endsection