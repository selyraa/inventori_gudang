@extends('admin.app')
@section('content')
@if($showModal)

<head>
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
</head>
<script>
    $(document).ready(function() {
        $('#modalEdit').modal('show');
    });
</script>
@endif
<div class="modal fade" id="modalEdit">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Supplier</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('supplier.update', $supplier->idSupplier) }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="idSupplier">ID Supplier</label>
                        <input type="text" name="idSupplier" class="form-control" id="idSupplier" value="{{ old('idSupplier', $supplier->idSupplier) }}" aria-describedby="idSupplier">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Supplier</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $supplier->nama) }}" aria-describedby="nama">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Supplier</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" value="{{ old('alamat', $supplier->alamat) }}" aria-describedby="alamat">
                    </div>
                    <div class="form-group">
                        <label for="noTelp">No Telepon</label>
                        <input type="text" name="noTelp" class="form-control" id="noTelp" value="{{ old('noTelp', $supplier->noTelp) }}" aria-describedby="noTelp">
                    </div>
                    <button type="submit" class="btn rounded" style="background-color: #282A3A; color: white;">Submit</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('supplier.index') }}">Kembali</a>
            </div>

        </div>
    </div>
</div>
@endsection