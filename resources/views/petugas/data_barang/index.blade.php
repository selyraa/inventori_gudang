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
            <h3 class="card-title font-weight-bold" style="margin-top: 15px;">Data Barang</h3><br>
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
                            <th>ID Barang</th>
                            <th>ID Supplier</th>
                            <th>ID User</th>
                            <th>ID Satuan</th>
                            <th>ID Kategori</th>
                            <th>Nama Barang</th>
                            <th>Foto Produk</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($barangs as $b)
                        <tr>
                            <td>{{ $b -> idBarang}}</td>
                            <td>
                                {{ $b -> idSupplier}}
                                @if($b->supplier)
                                <p style="font-weight: bold; font-size: 17px;">{{ $b->supplier->nama }}</p>
                                @endif
                            </td>
                            <td>
                                {{ $b -> idUser}}
                                @if($b->petugas)
                                <p style="font-weight: bold; font-size: 17px;">{{ $b->petugas->nama }}</p>
                                @endif
                            </td>
                            <td>
                                {{ $b -> idSatuan}}
                                @if($b->satuan)
                                <p style="font-weight: bold; font-size: 17px;">{{ $b->satuan->namaSatuan }}</p>
                                @endif
                            </td>
                            <td>
                                {{ $b -> idKategori}}
                                @if($b->kategori)
                                <p style="font-weight: bold; font-size: 17px;">{{ $b->kategori->namaKategori }}</p>
                                @endif
                            </td>
                            <td>{{ $b -> namaBarang}}</td>
                            <td><img src="{{ asset('storage/'.$b->fotoProduk) }}" alt="Foto Produk" width="100"></td>
                            <td>
                                <form action="{{ route('barang.destroy',$b->idBarang) }}" method="POST">
                                    <a class="btn-action btn-show" href="{{ route('barang.show',$b->idBarang) }}">Show</a>
                                    <a class="btn-action btn-edit" href="{{ route('barang.edit',$b->idBarang) }}">Edit</a>
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
                <h4 class="modal-title">Tambah Data Barang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('barang.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="idBarang">ID Barang</label>
                        <input type="text" name="idBarang" class="form-control" id="idBarang" aria-describedby="idBarang">
                    </div>
                    <div class="form-group">
                        <label for="idSupplier">ID Supplier</label>
                        <select name="idSupplier" class="form-control">
                            <option value="">-- Pilih ID Supplier --</option>
                            @foreach($supplier as $s)
                            <option value="{{ old('idSupplier', $s->idSupplier) }}">{{ $s->idSupplier }} || {{ $s->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="idUser">ID User</label>
                        <input type="text" name="idUser" class="form-control" id="idUser" value="{{ Auth::user()->idUser }}">
                        <small>Nama Petugas: {{ Auth::user()->nama }}</small>
                    </div>
                    <div class="form-group">
                        <label for="idSatuan">ID Satuan</label>
                        <select name="idSatuan" class="form-control">
                            <option value="">-- Pilih ID Satuan Barang --</option>
                            @foreach($satuan as $s)
                            <option value="{{ $s -> idSatuan }}">{{ $s -> idSatuan }} || {{ $s -> namaSatuan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="idKategori">ID Kategori</label>
                        <select name="idKategori" class="form-control">
                            <option value="">-- Pilih ID Kategori Barang --</option>
                            @foreach($kategori as $k)
                            <option value="{{ $k -> idKategori }}">{{ $k -> idKategori }} || {{ $k -> namaKategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="namaBarang">Nama Barang</label>
                        <input type="text" name="namaBarang" class="form-control" id="namaBarang" aria-describedby="namaBarang">
                    </div>
                    <div class="form-group">
                        <label for="fotoProduk">Foto Produk</label>
                        <input type="file" name="fotoProduk" class="form-control" id="fotoProduk" aria-describedby="fotoProduk">
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
        {{ $barangs->links() }}
    </ul>
</div>
@endsection