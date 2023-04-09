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
                <h3 class="card-title">Satuan Barang</h3><br>
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
                        <th>ID Satuan</th>
                        <th>Nama Satuan Barang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($satuan_barangs as $s)
                        <tr>
                            <td>{{ $s -> idSatuan }}</td>
                            <td>{{ $s -> namaSatuan }}</td>
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
