@extends('petugas.app_petugas')
 @section('content')
 <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">Edit Satuan Barang</div>
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
            <form method="post" action="{{ route('satuan.update', $satuan->idSatuan) }}" id="myForm">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="idSatuan">ID Satuan Barang</label> 
                    <input type="text" name="idSatuan" class="form-control" id="idSatuan" value="{{ $satuan->idSatuan }}" aria-describedby="idSatuan" > 
                </div>
                <div class="form-group">
                    <label for="namaSatuan">Nama Satuan Barang</label> 
                    <input type="text" name="namaSatuan" class="form-control" id="namaSatuan" value="{{ $satuan->namaSatuan }}" aria-describedby="namaSatuan" > 
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection