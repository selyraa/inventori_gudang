@extends('petugas.app_petugas')
 @section('content')
 <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">Edit Detail Barang</div>
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
            <form method="post" action="{{ route('detailbrg.update', $detailbrg->idDetailBarang) }}" id="myForm">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="idDetailBarang">ID Detail Barang</label> 
                    <input type="text" name="idDetailBarang" class="form-control" id="idDetailBarang" value="{{ old('idDetailBarang', $detailbrg->idDetailBarang) }}" aria-describedby="idDetailBarang" > 
                </div>
                <div class="form-group">
                    <label for="idBarang">ID Barang</label> 
                    <select name="idBarang" class="form-control" id="idBarang">
                        @foreach($barang as $b)
                            <option value="{{ old('idBarang', $b -> idBarang) }}">{{ $b -> namaBarang }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- <div class="form-group">
                    <label for="idTransaksiMasuk">ID Transaksi Masuk</label> 
                    <select name="idTransaksiMasuk" class="form-control" id="idTransaksiMasuk">
                        @foreach($trmasuk as $tm)
                            <option value="{{ old('idTransaksiMasuk', $tm -> idTransaksiMasuk) }}">{{ $tm -> idTransaksiMasuk }}</option>
                        @endforeach
                    </select>
                </div> -->
                <div class="form-group">
                    <label for="tglProduksi">Tanggal Produksi</label> 
                    <input type="date" name="tglProduksi" class="form-control" id="tglProduksi" value="{{ old('tglProduksi', $detailbrg->tglProduksi) }}" aria-describedby="tglProduksi" > 
                </div>
                <div class="form-group">
                    <label for="tglExp">Tanggal Expired</label> 
                    <input type="date" name="tglExp" class="form-control" id="tglExp" value="{{ old('tglExp', $detailbrg->tglExp) }}" aria-describedby="tglExp" > 
                </div>
                <div class="form-group">
                    <label for="hargaBeli">Harga Beli</label> 
                    <input type="integer" name="hargaBeli" class="form-control" id="hargaBeli" value="{{ old('hargaBeli', $detailbrg->hargaBeli) }}" aria-describedby="hargaBeli" > 
                </div>
                <div class="form-group">
                    <label for="hargaJual">Harga Jual</label> 
                    <input type="integer" name="hargaJual" class="form-control" id="hargaJual" value="{{ old('hargaJual', $detailbrg->hargaJual) }}" aria-describedby="hargaJual" > 
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label> 
                    <input type="integer" name="stok" class="form-control" id="stok" value="{{ old('stok', $detailbrg->stok) }}" aria-describedby="stok" > 
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection