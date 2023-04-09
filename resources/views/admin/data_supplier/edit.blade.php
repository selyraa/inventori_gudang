@extends('admin.app')
 @section('content')
 <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">Edit User</div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="post" action="{{ route('supplier.update', $supplier->idSupplier) }}" id="myForm">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="idUser">ID Supplier</label> 
                    <input type="text" name="idSupplier" class="form-control" id="idSupplier" value="{{ $supplier->idSupplier }}" aria-describedby="idSupplier" > 
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label> 
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ $supplier->nama }}" aria-describedby="nama" > 
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label> 
                    <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $supplier->alamat }}" aria-describedby="alamat" > 
                </div>
                <div class="form-group">
                    <label for="noTelp">No Telepon</label> 
                    <input type="text" name="noTelp" class="form-control" id="noTelp" value="{{ $supplier->noTelp }}" aria-describedby="noTelp" > 
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection