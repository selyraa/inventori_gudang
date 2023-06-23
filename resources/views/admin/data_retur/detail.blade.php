@extends('admin.app')
@section('content')
@if($showModal)
<head>
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
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
                <h4 class="modal-title">Detail Data Retur</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>ID Retur: </b>{{$retur->idRetur}}</li>
                    <li class="list-group-item"><b>ID Transaksi Masuk: </b>{{$retur->idTransaksiMasuk}}</li>
                    <li class="list-group-item"><b>ID User: </b>{{$retur->idUser}}</li>
                    <li class="list-group-item"><b>Tanggal Retur: </b>{{$retur->tglRetur}}</li>
                </ul>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('retur.index') }}">Kembali</a>
            </div>


        </div>
    </div>
</div>
@endsection