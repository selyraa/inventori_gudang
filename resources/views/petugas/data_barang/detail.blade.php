@extends('petugas.app_petugas')
@section('content')
@if($showModal)
<head>
    <link rel="stylesheet" href="{{asset('assets/css/kategori.css')}}">
</head>
<script>
    $(document).ready(function() {
        $('#modalShow').modal('show');
    });
</script>
@endif
<div class="modal fade" id="modalShow">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Detail Data Barang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>ID Barang </b>{{$barang->idBarang}}</li>
                    <li class="list-group-item"><b>ID Supplier</b>{{$barang->idSupplier}}</li>
                    <li class="list-group-item"><b>ID User</b>{{$barang->idUser}}</li>
                    <li class="list-group-item"><b>ID Satuan </b>{{$barang->idSatuan}}</li>
                    <li class="list-group-item"><b>ID Kategori </b>{{$barang->idKategori}}</li>
                    <li class="list-group-item"><b>Nama Barang</b>{{$barang->namaBarang}}</li>
                    <li class="list-group-item"><b>Foto Produk </b><img src="{{ asset('storage/'.$barang->fotoProduk) }}" alt="Foto Produk" width="100"></li>
                </ul>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('barang.index') }}">Kembali</a>
            </div>

        </div>
    </div>
</div>
@endsection