@extends('admin.app')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
</head>
<br>
<div class="col-md-12 d-flex flex-row justify-content-end" data-toggle="modal" data-target="#myModal">
    <a class="btn rounded-pill" style="background: linear-gradient(to right, #6c63ff, #a892ff); color: white; padding: 12px 16px; font-size: 24px; margin-left: -8px;">
        <i class="fas fa-plus"></i>
    </a>
</div>
<section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title font-weight-bold" style="margin-top: 15px;">Data Supplier</h3><br>
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
                            <th>ID Supplier</th>
                            <th>Nama Supplier</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($supplier as $sup)
                        <tr>
                            <td>{{ $sup -> idSupplier}}</td>
                            <td>{{ $sup -> nama}}</td>
                            <td>{{ $sup -> alamat}}</td>
                            <td>{{ $sup -> noTelp}}</td>
                            <td>
                                <form action="{{ route('supplier.destroy',$sup->idSupplier) }}" method="POST">
                                    <a class="btn-action btn-show" href="{{ route('supplier.show',$sup->idSupplier) }}">Show</a>
                                    <a class="btn-action btn-edit" href="{{ route('supplier.edit',$sup->idSupplier) }}">Edit</a>
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
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Supplier</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('supplier.store') }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="idSupplier">ID Supplier</label>
                        <input type="text" name="idSupplier" class="form-control" id="idSupplier" aria-describedby="idSupplier">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Supplier</label>
                        <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat">
                    </div>
                    <div class="form-group">
                        <label for=" noTelp">No Telepon</label>
                        <input type="text" name="noTelp" class="form-control" id="noTelp" aria-describedby="noTelp">
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
<div class="col-md-12">
    <ul class="pagination">
        {{ $supplier->links() }}
    </ul>
</div>
@endsection