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
                <h4 class="modal-title">Detail Data Barang Masuk</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>ID Detail Masuk: </b>{{$detailmasuk->idDetailMasuk}}</li>
                    <li class="list-group-item"><b>ID Transaksi Masuk: </b>{{$detailmasuk->idTransaksiMasuk}}</li>
                    <li class="list-group-item"><b>ID Detail Barang: </b>{{$detailmasuk-> detailbarang ->idDetailBarang}}</li>
                    <li class="list-group-item"><b>Jumlah: </b>{{$detailmasuk->jumlah}}</li>
                </ul>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('detailmasuk.index') }}">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection