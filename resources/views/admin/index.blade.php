@extends('admin.app')
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
        background-color: #6c63ff;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .pagination li a:hover {
        background-color: #a892ff;
    }

    .pagination .active a {
        background-color: #a892ff;
    }
</style>

<br>
<div class="col-md-12 d-flex flex-row justify-content-end">
    <a class="btn rounded-pill" style="background: linear-gradient(to right, #6c63ff, #a892ff); color: white; padding: 12px 16px; font-size: 24px; margin-left: -8px;" href="{{ route('admin.create') }}">
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
            <h3 class="card-title font-weight-bold" style="margin-top:15px; color:black; font-size: 24px; font-family:'Helvetica Neue', sans-serif;">Data Pengguna</h3><br>
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
                <thead style="background: linear-gradient(to right, #6c63ff, #a892ff); color:#fff;">
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
                        <td>{{ $ptg->idUser }}</td>
                        <td>{{ $ptg->nama }}</td>
                        <td>{{ $ptg->umur }}</td>
                        <td>{{ $ptg->alamat }}</td>
                        <td>{{ $ptg->username }}</td>
                        <td>{{ $ptg->noTelp }}</td>
                        <td>
                            <form action="{{ route('admin.destroy',$ptg->idUser) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('admin.show',$ptg->idUser) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('admin.edit',$ptg->idUser) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                @if ($ptg->count() > 1)
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-12">
        <ul class="pagination">
            {{ $admin->links() }}
        </ul>
    </div>
</section>
@endsection
