@extends('petugas.app_petugas')
 @section('content')
 <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">Edit Data Transaksi Barang Keluar</div>
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
            <form method="post" action="{{ route('trkeluar.update', $trkeluar->idTransaksiKeluar) }}" id="myForm">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="idTransaksiKeluar">ID Transaksi Keluar</label> 
                    <input type="text" name="idTransaksiKeluar" class="form-control" id="idTransaksiKeluar" value="{{ old('idTransaksiKeluar', $trkeluar->idTransaksiKeluar) }}" aria-describedby="idTransaksiKeluar" > 
                </div>
                <div class="form-group">
                    <label for="idUser">ID User</label>
                    <select name="idUser" class="form-control" id="user">
                        @foreach($user as $u)
                            <option value="{{ $u -> idUser }}">{{ $u -> username }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="idToko">ID Toko</label> 
                    <select name="idToko" class="form-control" id="toko">
                        @foreach($toko as $t)
                            <option value="{{ old('idToko', $t -> idToko) }}">{{ $t -> nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tglTransaksiKeluar">Tanggal Transaksi Keluar</label> 
                    <input type="date" name="tglTransaksiKeluar" class="form-control" id="tglTransaksiKeluar" value="{{ old('tglTransaksiKeluar', $trkeluar->tglTransaksiKeluar) }}" aria-describedby="tglTransaksiKeluar" > 
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection