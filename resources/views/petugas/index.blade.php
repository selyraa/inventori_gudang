@extends('petugas.app_petugas')
@section('content')
<div class="col-md-12 d-flex flex-row justify-content-end">
    <a class="btn btn-success" href="{{ route('petugas.create') }}"> Input Petugas</a>
</div>
<section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section>
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Petugas</h3><br>
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
                <table class="table table-hover">
                <thead>
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
                    @foreach ($users as $ptg)
                    <tr>
                    <td>{{ $ptg -> idUser}}</td>
                    <td>{{ $ptg -> nama}}</td>
                    <td>{{ $ptg -> umur}}</td>
                    <td>{{ $ptg -> alamat}}</td>
                    <td>{{ $ptg -> username}}</td>
                    <td>{{ $ptg -> noTelp}}</td>
                    <td>
                        <form action="{{ route('petugas.destroy',$ptg->idUser) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('petugas.show',$ptg->idUser) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('petugas.edit',$ptg->idUser) }}">Edit</a>
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
