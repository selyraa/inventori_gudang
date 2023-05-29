@extends('petugas.app_petugas')
@section('content')
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Transaksi Barang Masuk</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('trmasuk.store') }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="idTransaksiMasuk">ID Transaksi Masuk</label>
                        <input type="text" name="idTransaksiMasuk" class="form-control" id="idTransaksiMasuk" aria-describedby="idTransaksiMasuk">
                    </div>
                    <div class="form-group">
                        <label for="idUser">ID User</label>
                        <select name="idUser" class="form-control" id="idUser">
                            <option value="">-- Pilih ID User --</option>
                            @foreach($user as $u)
                            <option value="{{ $u->idUser }}">{{ $u->username }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="idSupplier">ID Supplier</label>
                        <select name="idSupplier" class="form-control">
                            @foreach($supplier as $s)
                            <option value="{{ $s -> idSupplier }}">{{ $s -> nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tglTransaksiMasuk">Tanggal Transaksi Masuk</label>
                        <input type="date" name="tglTransaksiMasuk" class="form-control" id="tglTransaksiMasuk" aria-describedby="tglTransaksiMasuk" placeholder="Tanggal Transaksi Masuk">
                    </div>
                    <button type="submit" class="btn rounded" style="background-color: #282A3A; color: white;">Submit</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection