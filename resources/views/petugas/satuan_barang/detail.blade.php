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
                <h4 class="modal-title">Detail Satuan Barang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
<<<<<<< HEAD
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>ID Satuan: </b>{{$satuan->idSatuan}}</li>
                    <li class="list-group-item"><b>Nama Satuan: </b>{{$satuan->namaSatuan}}</li>
                </ul>
=======
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>ID Satuan: </b>{{$satuan->idSatuan}}</li>
                <li class="list-group-item"><b>Nama Satuan: </b>{{$satuan->namaSatuan}}</li>
            </ul>
>>>>>>> 30f6f0419290cc205b634e756114667334f7eee7
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('satuan.index') }}">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection