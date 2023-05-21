@extends('petugas.app_petugas')
 @section('content')
 <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">Edit Detail Barang Keluar</div>
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
            <form method="post" action="{{ route('detailkeluar.update', $detailkeluar->idDetailKeluar) }}" id="myForm">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="idDetailKeluar">ID Detail Keluar</label> 
                    <input type="text" name="idDetailKeluar" class="form-control" id="idDetailKeluar" value="{{ old('idDetailKeluar', $detailkeluar->idDetailKeluar) }}" aria-describedby="idDetailKeluar" > 
                </div>
                <div class="form-group">
                    <label for="idTransaksiKeluar">ID Transaksi Keluar</label> 
                    <select name="idTransaksiKeluar" class="form-control" id="idTransaksiKeluar">
                        @foreach($trkeluar as $tk)
                            <option value="{{ old('idTransaksiKeluar', $tk -> idTransaksiKeluar) }}">{{ $tk -> idTransaksiKeluar }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="idDetailBarang">ID Detail Barang</label> 
                    <select name="idDetailBarang" class="form-control" id="idDetailBarang">
                        @foreach($detailbarang as $db)
                            <option value="{{ old('idDetailBarang', $db -> idDetailBarang) }}">{{ $db -> barang -> namaBarang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label> 
                    <input type="text" name="jumlah" class="form-control" id="jumlah" value="{{ old('jumlah', $detailkeluar->jumlah) }}" aria-describedby="jumlah" > 
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection