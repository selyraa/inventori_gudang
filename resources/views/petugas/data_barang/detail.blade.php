@extends('petugas.app_petugas')
 @section('content')
 <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">Detail Data Barang</div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>ID Barang: </b>{{$barang->idBarang}}</li>
                <li class="list-group-item"><b>ID Supplier: </b>{{$barang->idSupplier}}</li>
                <li class="list-group-item"><b>ID User: </b>{{$barang->idUser}}</li>
                <li class="list-group-item"><b>ID Satuan: </b>{{$barang->idSatuan}}</li>
                <li class="list-group-item"><b>ID Kategori: </b>{{$barang->idKategori}}</li>
                <li class="list-group-item"><b>Nama Barang: </b>{{$barang->namaBarang}}</li>
            </ul>
        </div>
        <a class="btn btn-success mt-3" href="{{ route('barang.index') }}">Kembali</a>
    </div>
</div>
</div>
@endsection