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
            <h3 class="card-title font-weight-bold" style="margin-top:15px;">Laporan Data Supplier</h3><br>
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
            <br>
            <div class="row mt-4">
                <div class="col-auto">
                    <form method="get" action="{{ route('export_lapsupplier') }}" class="form-inline" id="form-export">
                        @csrf
                        <button type="submit" name="export" class="btn btn-info">Export Data</button>
                    </form>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID Supplier</th>
                        <th>Nama Supplier</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                    </tr>
                </thead>
                <tbody style="color:black;">
                    @foreach($supplier as $s)
                    <tr>
                        <td>{{ $s -> idSupplier}}</td>
                        <td>{{ $s -> nama}}</td>
                        <td>{{ $s -> alamat}}</td>
                        <td>{{ $s -> noTelp}}</td>
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