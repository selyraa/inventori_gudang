@extends('admin.app')
<head>
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
</head>
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
                <h4 class="modal-title">Detail User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>ID User: </b>{{$admin->idUser}}</li>
                <li class="list-group-item"><b>Nama: </b>{{$admin->nama}}</li>
                <li class="list-group-item"><b>Umur: </b>{{$admin->umur}}</li>
                <li class="list-group-item"><b>Alamat: </b>{{$admin->alamat}}</li>
                <li class="list-group-item"><b>Username: </b>{{$admin->username}}</li>
                <li class="list-group-item"><b>No Telepon: </b>{{$admin->noTelp}}</li>
            </ul>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('admin.index') }}">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection