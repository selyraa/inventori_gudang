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
                <h4 class="modal-title">Detail Petugas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>ID Petugas: </b>{{$petugas->idUser}}</li>
                <li class="list-group-item"><b>Nama: </b>{{$petugas->nama}}</li>
                <li class="list-group-item"><b>Umur: </b>{{$petugas->umur}}</li>
                <li class="list-group-item"><b>Alamat: </b>{{$petugas->alamat}}</li>
                <li class="list-group-item"><b>Username: </b>{{$petugas->username}}</li>
                <li class="list-group-item"><b>No Telepon: </b>{{$petugas->noTelp}}</li>
            </ul>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('petugas.index') }}">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection