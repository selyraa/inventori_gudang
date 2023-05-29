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
                <h4 class="modal-title">Edit Detail Barang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('detailbrg.update', $detailbrg->idDetailBarang) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="idDetailBarang">ID Detail Barang</label>
                        <input type="text" name="idDetailBarang" class="form-control" id="idDetailBarang" value="{{ old('idDetailBarang', $detailbrg->idDetailBarang) }}" aria-describedby="idDetailBarang">
                    </div>
                    <div class="form-group">
                        <label for="idBarang">ID Barang</label>
                        <select name="idBarang" class="form-control" id="idBarang">
                            @foreach($barang as $b)
                            <option value="{{ old('idBarang', $b -> idBarang) }}">{{ $b -> namaBarang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tglProduksi">Tanggal Produksi</label>
                        <input type="date" name="tglProduksi" class="form-control" id="tglProduksi" value="{{ old('tglProduksi', $detailbrg->tglProduksi) }}" aria-describedby="tglProduksi">
                    </div>
                    <div class="form-group">
                        <label for="tglExp">Tanggal Expired</label>
                        <input type="date" name="tglExp" class="form-control" id="tglExp" value="{{ old('tglExp', $detailbrg->tglExp) }}" aria-describedby="tglExp">
                    </div>
                    <div class="form-group">
                        <label for="hargaBeli">Harga Beli</label>
                        <input type="integer" name="hargaBeli" class="form-control" id="hargaBeli" value="{{ old('hargaBeli', $detailbrg->hargaBeli) }}" aria-describedby="hargaBeli">
                    </div>
                    <div class="form-group">
                        <label for="hargaJual">Harga Jual</label>
                        <input type="integer" name="hargaJual" class="form-control" id="hargaJual" value="{{ old('hargaJual', $detailbrg->hargaJual) }}" aria-describedby="hargaJual">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="integer" name="stok" class="form-control" id="stok" value="{{ old('stok', $detailbrg->stok) }}" aria-describedby="stok">
                    </div>
                    <button type="submit" class="btn rounded" style="background-color: #282A3A; color: white;">Submit</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('detailbrg.index') }}">Kembali</a>
            </div>


        </div>
    </div>
</div>
@endsection