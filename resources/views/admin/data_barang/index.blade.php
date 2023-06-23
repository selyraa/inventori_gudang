@extends('admin.app')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
</head>
<section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title font-weight-bold" style="margin-top:15px; color:black; font-size: 24px; font-family:'Helvetica Neue', sans-serif;">Data Barang</h3><br>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($adminBarang as $b)
                        <tr>
                            <td>
                                {{ $b -> idBarang}}
                            </td>
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <ul class="pagination">
            {{ $adminBarang->links() }}
        </ul>
    </div>
</section>
@endsection