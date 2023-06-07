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
                <h4 class="modal-title">Edit Data Transaksi Barang Masuk</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('trmasuk.update', $trmasuk->idTransaksiMasuk) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="idTransaksiMasuk">ID Transaksi Masuk</label>
                        <input type="text" name="idTransaksiMasuk" class="form-control" id="idTransaksiMasuk" value="{{ old('idTransaksiMasuk', $trmasuk->idTransaksiMasuk) }}" aria-describedby="idTransaksiMasuk">
                    </div>
                    <div class="form-group">
                        <label for="idUser">ID User</label>
                        <select name="idUser" class="form-control" id="user">
                            @foreach($user as $u)
                            <option value="{{ $u -> idUser }}">{{ $u -> username }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="idSupplier">ID Supplier</label>
                        <select name="idSupplier" class="form-control" id="supplier">
                            @foreach($supplier as $s)
                            <option value="{{ old('idSupplier', $s -> idSupplier) }}">{{ $s -> nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tglTransaksiMasuk">Tanggal Transaksi Masuk</label>
                        <input type="date" name="tglTransaksiMasuk" class="form-control" id="tglTransaksiMasuk" value="{{ old('tglTransaksiMasuk', $trmasuk->tglTransaksiMasuk) }}" aria-describedby="tglTransaksiMasuk">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('trmasuk.index') }}">Kembali</a>
            </div>

        </div>
    </div>
</div>
@endsection