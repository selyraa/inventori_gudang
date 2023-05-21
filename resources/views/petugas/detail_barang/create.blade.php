@extends('petugas.app_petugas')
@section('content')
<div class="container mt-5">
   <div class="row justify-content-center align-items-center">
   <div class="card" style="width: 24rem;">
   <div class="card-header">Tambah Detail Barang</div>
   
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
      
      <form method="post" action="{{ route('detailbrg.store') }}" id="myForm">
         @csrf
         <div class="form-group">
            <label for="idDetailBarang">ID Detail Barang</label> 
            <input type="text" name="idDetailBarang" class="form-control" id="idDetailBarang" aria-describedby="idDetailBarang" > 
         </div>
         <div class="form-group">
            <label for="idBarang">ID Barang</label> 
            <select name="idBarang" class="form-control">
                @foreach($barang as $b)
                    <option value="{{ $b -> idBarang }}">{{ $b -> namaBarang }}</option>
                @endforeach
            </select>
         </div>
         <!-- <div class="form-group">
            <label for="idTransaksiMasuk">ID Transaksi Masuk</label> 
            <select name="idTransaksiMasuk" class="form-control">
                @foreach($trmasuk as $tm)
                    <option value="{{ $tm -> idTransaksiMasuk }}">{{ $tm -> idTransaksiMasuk }}</option>
                @endforeach
            </select> 
         </div> -->
         <div class="form-group">
            <label for="tglProduksi">Tanggal Produksi</label> 
            <input type="date" name="tglProduksi" class="form-control" id="tglProduksi" aria-describedby="tglProduksi" > 
         </div>
         <div class="form-group">
            <label for="tglExp">Tanggal Expired</label> 
            <input type="date" name="tglExp" class="form-control" id="tglExp" aria-describedby="tglExp" > 
         </div>
         <div class="form-group">
            <label for="hargaBeli">Harga Beli</label> 
            <input type="integer" name="hargaBeli" class="form-control" id="hargaBeli" aria-describedby="hargaBeli" > 
         </div>
         <div class="form-group">
            <label for="hargaJual">Harga Jual</label> 
            <input type="integer" name="hargaJual" class="form-control" id="hargaJual" aria-describedby="hargaJual" > 
         </div>
         <div class="form-group">
            <label for="stok">Stok</label> 
            <input type="integer" name="stok" class="form-control" id="stok" aria-describedby="stok" > 
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>
      </form>
   </div>
</div>
</div>
</div>
@endsection