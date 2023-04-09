@extends('admin.app')
@section('content')
<div class="col-md-12 d-flex flex-row justify-content-end">
    <a class="btn btn-success" href="{{ route('admin.create') }}"> Input User</a>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="table-responsive">
<table class="table table-hover">
<thead class="table-primary">
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

<div class="row">
    <div class="col-md-12">
        {{ $admin->links() }}
    </div>
</div>
@endsection
