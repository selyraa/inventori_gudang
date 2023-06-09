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
                <h4 class="modal-title">Edit Data Transaksi Barang Keluar</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('trkeluar.update', $trkeluar->idTransaksiKeluar) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="idTransaksiKeluar">ID Transaksi Keluar</label>
                        <input type="text" name="idTransaksiKeluar" class="form-control" id="idTransaksiKeluar" value="{{ old('idTransaksiKeluar', $trkeluar->idTransaksiKeluar) }}" aria-describedby="idTransaksiKeluar">
                    </div>
                    <div class="form-group">
                        <label for="idUser">ID User</label>
                        <input type="text" name="idUser" class="form-control" id="idUser" value="{{ Auth::user()->idUser }}">
                        <small>Nama Petugas: {{ Auth::user()->nama }}</small>
                    </div>
                    <div class="form-group">
                        <label for="idToko">ID Toko</label>
                        <select name="idToko" class="form-control" id="toko">
                            @php
                            $currentIdToko = $trkeluar->idToko; 
                            @endphp
                            @foreach($toko as $t)
                            <option value="{{ $t->idToko }}" {{ (old('idToko', $t->idToko) == $currentIdToko) ? 'selected' : '' }}>
                                {{ $t->idToko }} || {{ $t->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tglTransaksiKeluar">Tanggal Transaksi Keluar</label>
                        <input type="date" name="tglTransaksiKeluar" class="form-control" id="tglTransaksiKeluar" value="{{ old('tglTransaksiKeluar', $trkeluar->tglTransaksiKeluar) }}" aria-describedby="tglTransaksiKeluar">
                    </div>
                    <button type="submit" class="btn-action btn-submit">Submit</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('trkeluar.index') }}">Kembali</a>
            </div>

        </div>
    </div>
</div>
@endsection