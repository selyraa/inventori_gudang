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
                <h4 class="modal-title">Detail Transaksi Barang Masuk</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>ID Transaksi Masuk: </b>{{$trmasuk->idTransaksiMasuk}}</li>
                <li class="list-group-item"><b>ID User: </b>{{$trmasuk->idUser}}</li>
                <li class="list-group-item"><b>ID Supplier: </b>{{$trmasuk->idSupplier}}</li>
                <li class="list-group-item"><b>Tanggal Transaksi Masuk: </b>{{$trmasuk->tglTransaksiMasuk}}</li>
            </ul>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('trmasuk.index') }}">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection