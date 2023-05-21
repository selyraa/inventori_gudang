@extends('petugas.app_petugas')
@section('content')
<div class="col-md-12 d-flex flex-row justify-content-end">
    <a class="btn rounded-pill" style="background-color: #0A4D68; color: white; padding: 12px 16px; font-size: 24px; margin-left: -8px;" href="{{ route('trkeluar.create') }}">
        <i class="fas fa-plus"></i>
    </a>
</div>
<section class="content-header">
    <div class="container-fluid">
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title font-weight-bold" style="margin-top:15px;">Transaksi Barang Keluar</h3><br>
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
            <table class="table table-hover table-bordered">
                <thead style="background-color:#19A7CE; color:white;">
                    <tr>
                        <th>ID Transaksi Keluar</th>
                        <th>ID User</th>
                        <th>ID Toko</th>
                        <th>Tanggal Transaksi Keluar</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trkeluar as $tk)
                    <tr>
                        <td>{{ $tk -> idTransaksiKeluar}}</td>
                        <td>{{ $tk -> idUser}}</td>
                        <td>{{ $tk -> idToko}}</td>
                        <td>{{ $tk -> tglTransaksiKeluar}}</td>
                        <td>
                            <form action="{{ route('trkeluar.destroy',$tk->idTransaksiKeluar) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('trkeluar.show',$tk->idTransaksiKeluar) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('trkeluar.edit',$tk->idTransaksiKeluar) }}">Edit</a>
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
    </div>
</section>
@endsection