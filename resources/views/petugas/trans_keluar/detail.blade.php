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
                <h4 class="modal-title">Detail Transaksi Barang Keluar</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>ID Transaksi Keluar</b>{{$trkeluar->idTransaksiKeluar}}</li>
                    <li class="list-group-item"><b>ID User</b>{{$trkeluar->idUser}}</li>
                    <li class="list-group-item"><b>ID Toko</b>{{$trkeluar->idToko}}</li>
                    <li class="list-group-item"><b>Tanggal Transaksi Keluar</b>{{$trkeluar->tglTransaksiKeluar}}</li>
                </ul>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="{{ route('trkeluar.index') }}">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    @endsection
