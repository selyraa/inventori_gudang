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
                <h4 class="modal-title">Detail Barang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>ID Detail Barang: </b>{{$detailbrg->idDetailBarang}}</li>
                    <li class="list-group-item"><b>ID Barang: </b>{{$detailbrg->idBarang}}</li>
                    <!-- <li class="list-group-item"><b>ID Transaksi Masuk: </b>{{$detailbrg->idTransaksiMasuk}}</li> -->
                    <li class="list-group-item"><b>Tanggal Produksi: </b>{{$detailbrg->tglProduksi}}</li>
                    <li class="list-group-item"><b>Tanggal Expired: </b>{{$detailbrg->tglExp}}</li>
                    <li class="list-group-item"><b>Harga Beli: </b>{{$detailbrg->hargaBeli}}</li>
                    <li class="list-group-item"><b>Harga Jual: </b>{{$detailbrg->hargaJual}}</li>
                    <li class="list-group-item"><b>Stok: </b>{{$detailbrg->stok}}</li>
                </ul>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('detailbrg.index') }}">Kembali</a>
            </div>


        </div>
    </div>
</div>
@endsection