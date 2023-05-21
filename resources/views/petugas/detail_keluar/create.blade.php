@extends('petugas.app_petugas')
@section('content')
<div class="container mt-5">
   <div class="row justify-content-center align-items-center">
   <div class="card" style="width: 24rem;">
   <div class="card-header">Tambah Detail Barang Keluar</div>
   
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
      
      <form method="post" action="{{ route('detailkeluar.store') }}" id="myForm">
         @csrf
         <div class="form-group">
            <label for="idDetailKeluar">ID Detail Keluar</label> 
            <input type="text" name="idDetailKeluar" class="form-control" id="idDetailKeluar" aria-describedby="idDetailKeluar" > 
         </div>
         <div class="form-group">
            <label for="idTransaksiKeluar">ID Transaksi Keluar</label> 
            <select name="idTransaksiKeluar" class="form-control">
                @foreach($trkeluar as $tk)
                    <option value="{{ $tk -> idTransaksiKeluar }}">{{ $tk -> idTransaksiKeluar }}</option>
                @endforeach
            </select> 
         </div>
         <div class="form-group">
            <label for="idDetailBarang">ID Detail Barang</label> 
            <select name="idDetailBarang" class="form-control">
                @foreach($detailbarang as $db)
                    <option value="{{ $db -> idDetailBarang }}">{{ $db -> barang -> namaBarang }}</option>
                @endforeach
            </select>
         </div>
         <div class="form-group">
            <label for="jumlah">Jumlah</label> 
            <input type="text" name="jumlah" class="form-control" id="jumlah" aria-describedby="jumlah" > 
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>
      </form>
   </div>
</div>
</div>
</div>
@endsection