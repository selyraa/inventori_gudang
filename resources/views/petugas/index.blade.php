@extends('petugas.app_petugas')
@section('content')
<div class="col-md-12 d-flex flex-row justify-content-end">
    <a class="btn btn-success" href="{{ route('petugas.create') }}"> Input Petugas</a>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID User</th>
        <th>Nama</th>
        <th>Umur</th>
        <th>Alamat</th>
        <th>Username</th>
        <th>No Telp</th>
        <th width="280px">Action</th>
    </tr>
    
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
</table>
@endsection
