@extends('petugas.app_petugas')
@section('content')
<style>
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
        margin-bottom: 10px;
        list-style-type: none;
        padding: 0;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination li a {
        display: block;
        padding: 8px 12px;
        text-decoration: none;
        color: #fff;
        background-color: #9BA4B5;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .pagination li a:hover {
        background-color: #737f8f;
    }

    .pagination .active a {
        background-color: #737f8f;
    }
</style>
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
            <h3 class="card-title font-weight-bold" style="margin-top: 15px;">Data Petugas</h3><br>
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
            <table class="table table-hover table-bordered">
                <thead style="background-color: #2D7FC1;">
                    <tr>
                        <th>ID User</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th>Username</th>
                        <th>No Telp</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengguna as $ptg)
                    <tr>
                        <td>{{ $ptg -> idUser}}</td>
                        <td>{{ $ptg -> nama}}</td>
                        <td>{{ $ptg -> umur}}</td>
                        <td>{{ $ptg -> alamat}}</td>
                        <td>{{ $ptg -> username}}</td>
                        <td>{{ $ptg -> noTelp}}</td>
                        <td>
                            <form action="{{ route('petugas.destroy',$ptg->idUser) }}" method="POST">
                                <a class="btn" style="background-color: #19A7CE; color: #FFFFFF;" href="{{ route('petugas.show',$ptg->idUser) }}">Show</a>
                                <a class="btn" style="background-color: #3461A4; color: #FFFFFF;" href="{{ route('petugas.edit',$ptg->idUser) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" style="background-color: #E74C3C; color: #FFFFFF;">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Petugas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('petugas.store') }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="idUser">ID Petugas</label>
                        <input type="text" name="idUser" class="form-control" id="idUser" aria-describedby="idUser">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama">
                    </div>
                    <div class="form-group">
                        <label for="umur">Umur</label>
                        <input type="text" name="umur" class="form-control" id="umur" aria-describedby="umur">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" aria-describedby="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" aria-describedby="password">
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
        {{ $pengguna->links() }}
    </ul>
</div>
@endsection