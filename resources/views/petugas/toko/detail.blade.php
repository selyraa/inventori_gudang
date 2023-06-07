@extends('petugas.app_petugas')
@section('content')
@if($showModal)
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
                <h4 class="modal-title">Detail Data Toko</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>ID Toko: </b>{{$toko->idToko}}</li>
                    <li class="list-group-item"><b>Nama Toko: </b>{{$toko->nama}}</li>
                    <li class="list-group-item"><b>Alamat Toko: </b>{{$toko->alamat}}</li>
                    <li class="list-group-item"><b>No Telp: </b>{{$toko->noTelp}}</li>
                </ul>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('toko.index') }}">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection