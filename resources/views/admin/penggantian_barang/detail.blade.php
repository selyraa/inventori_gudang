@extends('admin.app')
@section('content')
<head>
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
</head>
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
                <h4 class="modal-title">Detail Penggantian Barang Retur</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>ID Penggantian Barang</b>{{$penggantian->idPenggantianBarang}}</li>
                    <li class="list-group-item"><b>ID Detail Retur</b>{{$penggantian->idDetailRetur}}</li>
                    <li class="list-group-item"><b>Jumlah Penggantian</b>{{$penggantian->jumlahPenggantian}}</li>
                    <li class="list-group-item"><b>Selisih Retur</b>{{$penggantian->selisihRetur}}</li>
                    <li class="list-group-item"><b>Pengurangan Profit</b>Rp. {{ number_format($penggantian -> penguranganProfit, 0, ',', '.') }}</li>
                    <li class="list-group-item"><b>Keterangan</b>{{$penggantian->keterangan}}</li>
                    <li class="list-group-item"><b>Tanggal Penggantian</b>{{$penggantian->tglPenggantian}}</li>
                </ul>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('penggantianbarang.index') }}">Kembali</a>
            </div>


        </div>
    </div>
</div>
@endsection