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
            <h3 class="card-title font-weight-bold" style="margin-top: 15px;">Data Toko</h3><br>
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
                            <th>ID Toko</th>
                            <th>Nama Toko</th>
                            <th>Alamat Toko</th>
                            <th>No Telepon</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($toko as $t)
                        <tr>
                            <td>{{ $t -> idToko}}</td>
                            <td>{{ $t -> nama}}</td>
                            <td>{{ $t -> alamat}}</td>
                            <td>{{ $t -> noTelp}}</td>
                            <td>
                                <form action="{{ route('toko.destroy',$t->idToko) }}" method="POST">
                                    <a class="btn-action btn-show" href="{{ route('toko.show',$t->idToko) }}">Show</a>
                                    <a class="btn-action btn-edit" href="{{ route('toko.edit',$t->idToko) }}">Edit</a>
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
        <div>
</section>
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Toko</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('toko.store') }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="idToko">ID Toko</label>
                        <input type="text" name="idToko" class="form-control" id="idToko" aria-describedby="idToko">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Toko</label>
                        <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Toko</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat">
                    </div>
                    <div class="form-group">
                        <label for="noTelp">No Telp</label>
                        <input type="text" name="noTelp" class="form-control" id="noTelp" aria-describedby="noTelp">
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
        {{ $toko->links() }}
    </ul>
</div>
@endsection