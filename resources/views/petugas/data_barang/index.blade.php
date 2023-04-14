@extends('petugas.app_petugas')
@section('content')
<div class="col-md-12 d-flex flex-row justify-content-end">
    <a class="btn btn-success" href="{{ route('barang.create') }}"> Input Data Barang</a>
</div>
<section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section>
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Kategori Barang</h3><br>
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
                <table class="table">
                <thead>
                    <tr>
                        <th>ID Barang</th>
                        <th>ID Supplier</th>
                        <th>ID User</th>
                        <th>ID Satuan</th>
                        <th>ID Kategori</th>
                        <th>Nama Barang</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barangs as $b)
                        <tr>
                            <td>{{ $b -> idBarang}}</td>
                            <td>{{ $b -> idSupplier}}</td>
                            <td>{{ $b -> idUser}}</td>
                            <td>{{ $b -> idSatuan}}</td>
                            <td>{{ $b -> idKategori}}</td>
                            <td>{{ $b -> namaBarang}}</td>
                            <td>
                                <form action="{{ route('barang.destroy',$b->idBarang) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('barang.show',$b->idBarang) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('barang.edit',$b->idBarang) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer">
                --
            </div> -->
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
@endsection
