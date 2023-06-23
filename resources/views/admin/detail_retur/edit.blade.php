@extends('admin.app')
@section('content')
@if($showModal)
<head>
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
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
                <h4 class="modal-title">Edit Detail Data Retur</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('detailretur.update', $detailretur->idDetailRetur) }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="idDetailRetur">ID Detail Retur</label>
                        <input type="text" name="idDetailRetur" class="form-control" id="idDetailRetur" value="{{ old('idDetailRetur', $detailretur->idDetailRetur) }}" aria-describedby="idDetailRetur">
                    </div>
                    <div class="form-group">
                        <label for="idRetur">ID Retur</label>
                        <select name="idRetur" class="form-control" id="retur">
                            <option value="">-- Pilih ID Data Retur --</option>
                            @foreach($retur as $r)
                            <option value="{{ $r->idRetur }}" data-supplier="{{ $r->trmasuk->suppliers->idSuplier }}">{{ $r->idRetur }} || {{ $r->trmasuk->suppliers->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="idDetailBrang">ID Detail Barang</label>
                        <select name="idDetailBrang" class="form-control" id="detailbarang">
                            <option value="">-- Pilih ID Detail Barang --</option>
                            @foreach($detailbarang as $db)
                            <option value="{{ old('idDetailBarang', $db -> idDetailBarang) }}">{{ $db -> barang -> namaBarang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="jumlah">Jumlah</label> 
                    <input type="text" name="jumlah" class="form-control" id="jumlah" value="{{ old('jumlah', $detailretur->jumlah) }}" aria-describedby="jumlah" > 
                </div>
                    <button type="submit" class="btn rounded" style="background-color: #282A3A; color: white;">Submit</button>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('detailretur.index') }}">Kembali</a>
            </div>

        </div>
    </div>
</div>
@endsection