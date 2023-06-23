@extends('admin.app')
<head>
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
</head>
@section('content')
@if($showModal)
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
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <form method="post" action="{{ route('admin.update', $admin->idUser) }}" id="myForm">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="idUser">ID User</label> 
                    <input type="text" name="idUser" class="form-control" id="idUser" value="{{ $admin->idUser }}" aria-describedby="idUser" > 
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label> 
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ $admin->nama }}" aria-describedby="nama" > 
                </div>
                <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="text" name="umur" class="form-control" id="umur" value="{{ $admin->umur }}" aria-describedby="umur" > 
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label> 
                    <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $admin->alamat }}" aria-describedby="alamat" > 
                </div>
                <div class="form-group">
                    <label for="username">Username</label> 
                    <input type="text" name="username" class="form-control" id="username" value="{{ $admin->username }}" aria-describedby="username" > 
                </div>
                <div class="form-group">
                    <label for="password">Password</label> 
                    <input type="password" name="password" class="form-control" id="password" value="{{ $admin->password }}" aria-describedby="password" > 
                </div>
                <div class="form-group">
                    <label for="noTelp">No Telepon</label> 
                    <input type="text" name="noTelp" class="form-control" id="noTelp" value="{{ $admin->noTelp }}" aria-describedby="noTelp" > 
                </div>
                <div class="form-group">
                    <label for="role">Role</label> 
                    <input type="text" name="role" class="form-control" id="role" value="{{ $admin->role }}" aria-describedby="role" > 
                </div>
                <button type="submit" class="btn-action btn-submit">Submit</button>
            </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('admin.index') }}">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection