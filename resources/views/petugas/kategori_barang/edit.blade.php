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
                <h4 class="modal-title">Edit Kategori Barang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('kategori.update', $kategori->idKategori) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="idKategori">ID Kategori Barang</label>
                        <input type="text" name="idKategori" class="form-control" id="idKategori" value="{{ $kategori->idKategori }}" aria-describedby="idKategori">
                    </div>
                    <div class="form-group">
                        <label for="namaKategori">Nama Kategori Barang</label>
                        <input type="text" name="namaKategori" class="form-control" id="namaKategori" value="{{ $kategori->namaKategori }}" aria-describedby="namaKategori">
                    </div>
                    <button type="submit" class="btn btn-submit">Submit</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('kategori.index') }}">Kembali</a>
            </div>


        </div>
    </div>
</div>
@endsection
