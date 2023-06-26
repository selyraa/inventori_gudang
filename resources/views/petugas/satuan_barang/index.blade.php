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
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title font-weight-bold" style="margin-top: 15px;">Satuan Barang</h3><br>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus" style="color: #fff;"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times" style="color: #fff;"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID Satuan</th>
                            <th>Nama Satuan Barang</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($satuan as $s)
                        <tr>
                            <td>{{ $s -> idSatuan }}</td>
                            <td>{{ $s -> namaSatuan }}</td>
                            <td>
                                <form action="{{ route('satuan.destroy',$s->idSatuan) }}" method="POST">
                                    <a class="btn-action btn-show" href="{{ route('satuan.show',$s->idSatuan) }}">Show</a>
                                    <a class="btn-action btn-edit" href="{{ route('satuan.edit',$s->idSatuan) }}">Edit</a>
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
                <h4 class="modal-title">Tambah Satuan Barang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('satuan.store') }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="idSatuan">ID Satuan</label>
                        <input type="text" name="idSatuan" class="form-control" id="idSatuan" aria-describedby="idSatuan">
                    </div>
                    <div class="form-group">
                        <label for="namaSatuan">Nama Satuan</label>
                        <input type="text" name="namaSatuan" class="form-control" id="namaSatuan" aria-describedby="namaSatuan">
                    </div>
                    <button type="submit" class="btn-action btn-submit">Submit</button>
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
        {{ $satuan->links() }}
    </ul>
</div>
@endsection