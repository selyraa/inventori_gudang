@extends('admin.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section>
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title font-weight-bold" style="margin-top:15px; color:black;">Data Barang</h3><br>
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
                <table class="table table-hover table-bordered" style="color:black;">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Barang</th>
                            <th>ID Supplier</th>
                            <th>ID User</th>
                            <th>ID Satuan</th>
                            <th>ID Kategori</th>
                            <th>Nama Barang</th>
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
