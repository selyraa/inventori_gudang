@extends('petugas.app_petugas')
@section('content')
<div class="container mt-5">
   <div class="row justify-content-center align-items-center">
   <div class="card" style="width: 24rem;">
   <div class="card-header">Tambah Detail Barang Masuk</div>
   
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
      
      <form method="post" action="{{ route('detailmasuk.store') }}" id="myForm">
         @csrf
         <div class="form-group">
            <label for="idDetailMasuk">ID Detail Masuk</label> 
            <input type="text" name="idDetailMasuk" class="form-control" id="idDetailMasuk" aria-describedby="idDetailMasuk" > 
         </div>
         <div class="form-group">
            <label for="idTransaksiMasuk">ID Transaksi Masuk</label> 
            <select name="idTransaksiMasuk" class="form-control">
                @foreach($trmasuk as $tm)
                    <option value="{{ $tm -> idTransaksiMasuk }}">{{ $tm -> idTransaksiMasuk }}</option>
                @endforeach
            </select> 
         </div>
         <div class="form-group">
            <label for="idDetailBarang">ID Detail Barang</label> 
            <select name="idDetailBarang" class="form-control">
                @foreach($detailbarang as $b)
                    <option value="{{ $b -> idDetailBarang }}">{{ $b -> barang -> namaBarang }}</option>
                @endforeach
            </select>
         </div>
         <div class="form-group">
            <label for="jumlah">Jumlah</label> 
            <input type="text" name="jumlah" class="form-control" id="jumlah" aria-describedby="Jumlah" > 
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>
      </form>
   </div>
</div>
</div>
</div>
@endsection