@extends('petugas.app_petugas')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('assets/css/kategori.css')}}">
</head>

<br>
<div class="col-md-12 d-flex flex-row justify-content-end" data-toggle="modal" data-target="#myModal">
    <a class="btn rounded-pill" style="background-color: #2D7FC1; color: white; padding: 12px 16px; font-size: 24px; margin-left: -8px;">
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
            <h3 class="card-title font-weight-bold" style="margin-top: 15px;">Transaksi Barang Keluar</h3><br>
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
            <div class="row mt-2">
                <div class="col-auto">
                    <form method="post" action="{{ route('trkeluar.filterTransKeluar') }}" class="form-inline" id="form-filter">
                        @csrf
                        <input type="date" name="tgl_mulai" class="form-control">
                        <input type="date" name="tgl_selesai" class="form-control ml-3">
                        <button type="submit" name="filter_tgl" class="btn btn-info ml-3">Filter</button>
                    </form>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
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
                            <td>
                                {{ $tk -> idUser}}
                                @if($tk->petugas)
                                <p style="font-weight: bold; font-size: 17px;">{{ $tk->petugas->nama }}</p>
                                @endif
                            </td>
                            <td>
                                {{ $tk -> idToko}}
                                @if($tk->toko)
                                <p style="font-weight: bold; font-size: 17px;">{{ $tk->toko->nama }}</p>
                                @endif
                            </td>
                            <td>{{ $tk -> tglTransaksiKeluar}}</td>
                            <td>
                                <form action="{{ route('trkeluar.destroy',$tk->idTransaksiKeluar) }}" method="POST">
                                    <a class="btn-action btn-show" href="{{ route('trkeluar.show',$tk->idTransaksiKeluar) }}">Show</a>
                                    <a class="btn-action btn-edit"  href="{{ route('trkeluar.edit',$tk->idTransaksiKeluar) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete" >Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Transaksi Barang Keluar</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('trkeluar.store') }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <!-- <label for="idTransaksiKeluar">ID Transaksi Keluar</label> -->
                        <input type="text" name="idTransaksiKeluar" class="form-control" id="idTransaksiKeluar" aria-describedby="idTransaksiKeluar" placeholder="ID Transaksi Keluar">
                    </div>
                    <div class="form-group">
                        <label for="idUser">ID User</label>
                        <input type="text" name="idUser" class="form-control" id="idUser" value="{{ Auth::user()->idUser }}">
                        <small>Username: {{ Auth::user()->username }}</small>
                    </div>
                    <div class="form-group">
                        <label for="idToko">ID Toko</label>
                        <select name="idToko" class="form-control">
                            @foreach($toko as $t)
                            <option value="{{ $t -> idToko }}">{{ $t -> nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tglTransaksiKeluar">Tanggal Transaksi Keluar</label>
                        <input type="date" name="tglTransaksiKeluar" class="form-control" id="tglTransaksiKeluar" aria-describedby="tglTransaksiKeluar" placeholder="Tanggal Transaksi Keluar">
                    </div>
                    <button type="submit" class="btn-action btn-submit">Submit</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <ul class="pagination">
        {{ $trkeluar->links() }}
    </ul>
</div>
@endsection