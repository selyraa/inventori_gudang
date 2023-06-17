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
                <h4 class="modal-title">Edit Satuan Barang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('satuan.update', $satuan->idSatuan) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="idSatuan">ID Satuan Barang</label>
                        <input type="text" name="idSatuan" class="form-control" id="idSatuan" value="{{ $satuan->idSatuan }}" aria-describedby="idSatuan">
                    </div>
                    <div class="form-group">
                        <label for="namaSatuan">Nama Satuan Barang</label>
                        <input type="text" name="namaSatuan" class="form-control" id="namaSatuan" value="{{ $satuan->namaSatuan }}" aria-describedby="namaSatuan">
                    </div><button type="submit" class="btn-action btn-submit">Submit</button><button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('satuan.index') }}">Kembali</a>
            </div>


        </div>
    </div>
</div>
@endsection