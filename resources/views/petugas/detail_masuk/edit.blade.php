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
                <h4 class="modal-title">Edit Detail Barang Masuk</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <form method="post" action="{{ route('detailmasuk.update', $detailmasuk->idDetailMasuk) }}" id="myForm">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="idDetailMasuk">ID Detail Masuk</label> 
                    <input type="text" name="idDetailMasuk" class="form-control" id="idDetailMasuk" value="{{ old('idDetailMasuk', $detailmasuk->idDetailMasuk) }}" aria-describedby="idDetailMasuk" > 
                </div>
                <div class="form-group">
                    <label for="idTransaksiMasuk">ID Transaksi Masuk</label> 
                    <select name="idTransaksiMasuk" class="form-control" id="idTransaksiMasuk">
                        @foreach($trmasuk as $tm)
                            <option value="{{ old('idTransaksiMasuk', $tm -> idTransaksiMasuk) }}">{{ $tm -> idTransaksiMasuk }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="idDetailBarang">ID Detail Barang</label> 
                    <select name="idDetailBarang" class="form-control" id="idDetailBarang">
                        @foreach($detailbarang as $b)
                            <option value="{{ old('idDetailBarang', $b -> idDetailBarang) }}">{{ $b -> barang -> namaBarang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label> 
                    <input type="text" name="jumlah" class="form-control" id="jumlah" value="{{ old('jumlah', $detailmasuk->jumlah) }}" aria-describedby="jumlah" > 
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('detailmasuk.index') }}">Kembali</a>
            </div>

        </div>
    </div>
</div>
@endsection