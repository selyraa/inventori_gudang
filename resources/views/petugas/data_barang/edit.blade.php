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
                <h4 class="modal-title">Edit Data Barang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('barang.update', $barang->idBarang) }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="idBarang">ID Barang</label>
                        <input type="text" name="idBarang" class="form-control" id="idBarang" value="{{ old('idBarang', $barang->idBarang) }}" aria-describedby="idBarang">
                    </div>
                    <div class="form-group">
                        <label for="idSupplier">ID Supplier</label>
                        <select name="idSupplier" class="form-control" id="supplier">
                            @foreach($supplier as $s)
                            <option value="{{ old('idSupplier', $s -> idSupplier) }}">{{ $s -> nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="idUser">ID User</label>
                        <select name="idUser" class="form-control" id="user">
                            @foreach($user as $u)
                            <option value="{{ $u -> idUser }}">{{ $u -> username }}</option>
                            @endforeach
                        </select>

                        <script>
                            document.getElementById('user').addEventListener('change', function() {
                                var selectedOption = this.value;
                                localStorage.setItem('selectedOption', selectedOption);
                            });
                        </script>
                    </div>
                    <div class="form-group">
                        <label for="idSatuan">ID Satuan</label>
                        <select name="idSatuan" class="form-control" id="satuan">
                            @foreach($satuan as $s)
                            <option value="{{ old('idSatuan', $s -> idSatuan) }}">{{ $s -> namaSatuan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="idKategori">ID Kategori</label>
                        <select name="idKategori" class="form-control">
                            @foreach($kategori as $k)
                            <option value="{{ $k -> idKategori }}">{{ $k -> namaKategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="namaBarang">Nama Barang</label>
                        <input type="text" name="namaBarang" class="form-control" id="namaBarang" value="{{ old('namaBarang', $barang->namaBarang) }}" aria-describedby="namaBarang">
                    </div>
                    <div class="form-group">
                        <label for="fotoProduk">Foto Produk</label>
                        <input type="file" class="form-control" required="required" name="fotoProduk" value="{{ $barang->fotoProduk }}"></br>
                        <img width="100px" height="100px" src="{{asset('storage/'.$barang->fotoProduk)}}">
                    </div>
                    <button type="submit" class="btn rounded" style="background-color: #282A3A; color: white;">Submit</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('barang.index') }}">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection