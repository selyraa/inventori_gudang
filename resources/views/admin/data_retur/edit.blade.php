@extends('admin.app')
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
                <h4 class="modal-title">Edit Data Retur Barang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('retur.update', $retur->idRetur) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="idRetur">ID Retur</label>
                        <input type="text" name="idRetur" class="form-control" id="idRetur" value="{{ old('idRetur', $retur->idRetur) }}" aria-describedby="idRetur">
                    </div>
                    <div class="form-group">
                        <label for="idTransaksiMasuk">ID Transaksi Masuk</label>
                        <select name="idTransaksiMasuk" class="form-control" id="idTransaksiMasuk">
                            <option value="">-- Pilih ID Transaksi Masuk --</option>
                            @foreach($trmasuk as $tm)
                            <option value="{{ $tm->idTransaksiMasuk }}">{{ $tm->idTransaksiMasuk }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="idUser">ID User</label>
                        <input type="text" name="idUser" class="form-control" id="idUser" value="{{ Auth::user()->idUser }}">
                        <small>Username: {{ Auth::user()->username }}</small>
                    </div>
                    <div class="form-group">
                        <label for="tglRetur">Tanggal Retur</label>
                        <input type="date" name="tglRetur" class="form-control" id="tglRetur" value="{{ old('tglRetur', $retur->tglRetur) }}" aria-describedby="tglRetur">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('retur.index') }}">Kembali</a>
            </div>

        </div>
    </div>
</div>
@endsection