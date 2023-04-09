@extends('admin.app')
@section('content')
<div class="col-md-12 d-flex flex-row justify-content-end">
    <a class="btn btn-success" href="{{ route('supplier.create') }}">Input Data Supplier</a>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID Supplier</th>
        <th>Nama Supplier</th>
        <th>Alamat</th>
        <th>No Telp</th>
        <th width="280px">Action</th>
    </tr>
    
    @foreach ($supplier as $sup)
    <tr>
    <td>{{ $sup -> idSupplier}}</td>
    <td>{{ $sup -> nama}}</td>
    <td>{{ $sup -> alamat}}</td>
    <td>{{ $sup -> noTelp}}</td>
    <td>
        <form action="{{ route('supplier.destroy',$sup->idSupplier) }}" method="POST">
            <a class="btn btn-info" href="{{ route('supplier.show',$sup->idSupplier) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('supplier.edit',$sup->idSupplier) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
    </tr>
    @endforeach
</table>
<div class="row">
    <div class="col-md-12">
        {{ $supplier->links() }}
    </div>
</div>
@endsection
