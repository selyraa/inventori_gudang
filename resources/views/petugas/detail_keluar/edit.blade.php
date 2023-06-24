@extends('petugas.app_petugas')
@section('content')
@if($showModal)

<head>
    <link rel="stylesheet" href="{{asset('assets/css/kategori.css')}}">
</head>
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
                <h4 class="modal-title">Edit Detail Barang Keluar</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('detailkeluar.update', $detailkeluar->idDetailKeluar) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="idDetailKeluar">ID Detail Keluar</label>
                        <input type="text" name="idDetailKeluar" class="form-control" id="idDetailKeluar" value="{{ old('idDetailKeluar', $detailkeluar->idDetailKeluar) }}" aria-describedby="idDetailKeluar">
                    </div>
                    <div class="form-group">
                        <label for="idTransaksiKeluar">ID Transaksi Keluar</label>
                        <select name="idTransaksiKeluar" class="form-control" id="idTransaksiKeluar">
                            @php
                            $currentIdToko = $detailkeluar->trkeluar->idToko; 
                            @endphp
                            @foreach($trkeluar as $tk)
                            <option value="{{ $tk->idToko }}" {{ (old('idToko', $tk->idToko) == $currentIdToko) ? 'selected' : '' }}>
                                {{ $tk->idTransaksiKeluar }} || {{ $tk->toko->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="idDetailBarang">ID Detail Barang</label>
                        <select name="idDetailBarang" class="form-control" id="idDetailBarang">
                            @php
                            $currentIdDetailBarang = $detailkeluar->idDetailBarang; 
                            @endphp
                            @foreach($detailbarang as $db)
                            <option value="{{ $db->idDetailBarang }}" {{ (old('idDetailBarang', $db->idDetailBarang) == $currentIdDetailBarang) ? 'selected' : '' }}>
                                {{ $db->idDetailBarang }} || {{ $db->barang->namaBarang }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" name="jumlah" class="form-control" id="jumlah" value="{{ old('jumlah', $detailkeluar->jumlah) }}" aria-describedby="jumlah">
                    </div>
                    <button type="submit" class="btn-action btn-submit">Submit</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('detailkeluar.index') }}">Kembali</a>
            </div>

        </div>
    </div>
</div>
@endsection