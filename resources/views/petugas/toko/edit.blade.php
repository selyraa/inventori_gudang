@extends('petugas.app_petugas')
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
                <h4 class="modal-title">Edit Data Toko</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <form method="post" action="{{ route('toko.update', $toko->idToko) }}" id="myForm">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="idToko">ID Toko</label> 
                    <input type="text" name="idToko" class="form-control" id="idToko" value="{{ old('idToko', $toko->idToko) }}" aria-describedby="idToko" > 
                </div>
                <div class="form-group">
                    <label for="nama">Nama Toko</label> 
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $toko->nama) }}" aria-describedby="nama" > 
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Toko</label> 
                    <input type="text" name="alamat" class="form-control" id="alamat" value="{{ old('alamat', $toko->alamat) }}" aria-describedby="alamat" > 
                </div>
                <div class="form-group">
                    <label for="noTelp">No Telp</label> 
                    <input type="text" name="noTelp" class="form-control" id="noTelp" value="{{ old('noTelp', $toko->noTelp) }}" aria-describedby="noTelp" > 
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('toko.index') }}">Kembali</a>
            </div>


        </div>
    </div>
</div>
@endsection