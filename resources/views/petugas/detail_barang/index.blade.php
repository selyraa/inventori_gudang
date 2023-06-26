@extends('petugas.app_petugas')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('assets/css/kategori.css')}}">
</head>
<br>
<div class="col-md-12 d-flex flex-row justify-content-end" data-toggle="modal" data-target="#myModal">
    <a class="btn rounded-pill" style="background-color: #2D7FC1; color: white; padding: 12px 16px; font-size: 24px; margin-left: -8px;">
        <i class="fas fa-plus"></i>
    </a>
</div>
<section class="content-header">
    <div class="container-fluid">
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title font-weight-bold" style="margin-top: 15px;">Detail Barang</h3><br>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID Detail Barang</th>
                            <th>ID Barang</th>
                            <!-- <th>ID Transaksi Masuk</th> -->
                            <th>Tanggal Produksi</th>
                            <th>Tanggal Expired</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detailbrg as $db)
                        <tr>
                            <td>{{ $db -> idDetailBarang}}</td>
                            <td>
                                {{ $db -> idBarang}}
                                @if($db->barang)
                                <p style="font-weight: bold; font-size: 17px;">{{ $db->barang->namaBarang }}</p>
                                @endif
                            </td>
                            <!-- <td>{{ $db -> idTransaksiMasuk}}</td> -->
                            <td>{{ $db -> tglProduksi}}</td>
                            <td>{{ $db -> tglExp}}</td>
                            <td>Rp. {{ number_format($db -> hargaBeli, 0, ',', '.') }}</td>
                            <td>Rp. {{ number_format($db -> hargaJual, 0, ',', '.') }}</td>
                            <td>
                                {{ $db -> stok}}
                                @if($db->barang)
                                <p style="font-weight: bold; font-size: 17px;">{{ $db->barang->satuan->namaSatuan }}</p>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('detailbrg.destroy', $db->idDetailBarang) }}" method="POST">
                                    <a class="btn-action btn-show" href="{{ route('detailbrg.show', $db->idDetailBarang) }}">Show</a>
                                    <a class="btn-action btn-edit" href="{{ route('detailbrg.edit', $db->idDetailBarang) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete">Delete</button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Detail Barang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('detailbrg.store') }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="idDetailBarang">ID Detail Barang</label>
                        <input type="text" name="idDetailBarang" class="form-control" id="idDetailBarang" aria-describedby="idDetailBarang">
                    </div>
                    <div class="form-group">
                        <label for="idBarang">ID Barang</label>
                        <select name="idBarang" class="form-control">
                            <option value="">-- Pilih ID Barang --</option>
                            @foreach($barang as $b)
                            <option value="{{ $b -> idBarang }}">{{ $b->idBarang }} || {{ $b -> namaBarang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tglProduksi">Tanggal Produksi</label>
                        <input type="date" name="tglProduksi" class="form-control" id="tglProduksi" aria-describedby="tglProduksi">
                    </div>
                    <div class="form-group">
                        <label for="tglExp">Tanggal Expired</label>
                        <input type="date" name="tglExp" class="form-control" id="tglExp" aria-describedby="tglExp">
                    </div>
                    <div class="form-group">
                        <label for="hargaBeli">Harga Beli</label>
                        <input type="integer" name="hargaBeli" class="form-control" id="hargaBeli" aria-describedby="hargaBeli">
                    </div>
                    <div class="form-group">
                        <label for="hargaJual">Harga Jual</label>
                        <input type="integer" name="hargaJual" class="form-control" id="hargaJual" aria-describedby="hargaJual">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="integer" name="stok" class="form-control" id="stok" aria-describedby="stok">
                    </div>
                    <button type="submit" class="btn-action btn-submit">Submit</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<div class="col-md-12">
    <ul class="pagination">
        {{ $detailbrg->links() }}
    </ul>
</div>
@endsection