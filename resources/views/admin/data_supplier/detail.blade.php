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
                <h4 class="modal-title">Detail Data Supplier</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>ID Supplier: </b>{{$supplier->idSupplier}}</li>
                    <li class="list-group-item"><b>Nama Supplier: </b>{{$supplier->nama}}</li>
                    <li class="list-group-item"><b>Alamat: </b>{{$supplier->alamat}}</li>
                    <li class="list-group-item"><b>No Telepon: </b>{{$supplier->noTelp}}</li>
                </ul>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('supplier.index') }}">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection