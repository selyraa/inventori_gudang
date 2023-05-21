@extends('admin.app')
@section('content')
<div class="col-md-12 d-flex flex-row justify-content-end">
    <a class="btn rounded-pill" style="background-color: #282A3A; color: white; padding: 12px 16px; font-size: 24px; margin-left: -8px;" href="{{ route('admin.create') }}">
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
                <h3 class="card-title font-weight-bold" style="margin-top:15px;">Data User</h3><br>
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
                    @foreach ($admin as $ptg)
                    <tr>
                    <td>{{ $ptg -> idUser}}</td>
                    <td>{{ $ptg -> nama}}</td>
                    <td>{{ $ptg -> umur}}</td>
                    <td>{{ $ptg -> alamat}}</td>
                    <td>{{ $ptg -> username}}</td>
                    <td>{{ $ptg -> noTelp}}</td>
                    <td>
                        <form action="{{ route('admin.destroy',$ptg->idUser) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('admin.show',$ptg->idUser) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('admin.edit',$ptg->idUser) }}">Edit</a>
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
        <div class="col-md-12">
            {{ $admin->links() }}
        </div>
    </section>
@endsection