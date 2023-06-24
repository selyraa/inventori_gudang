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
            <h3 class="card-title font-weight-bold" style="margin-top: 15px;">Transaksi Barang Masuk</h3><br>
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
                    <form method="post" action="{{ route('trmasuk.filterTransMasuk') }}" class="form-inline" id="form-filter">
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
                            <th>ID Transaksi Masuk</th>
                            <th>ID User</th>
                            <th>ID Supplier</th>
                            <th>Tanggal Transaksi Masuk</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($mulai = null || $selesai = null) {
                        ?>
                            @foreach($trmasuk as $tm)
                            <tr>
                                <td>{{ $tm -> idTransaksiMasuk}}</td>
                                <td>
                                    {{ $tm -> idUser}}
                                    @if($tm->petugas)
                                    <p style="font-weight: bold; font-size: 17px;">{{ $tm->petugas->nama }}</p>
                                    @endif
                                </td>
                                <td>
                                    {{ $tm -> idSupplier}}
                                    @if($tm->suppliers)
                                    <p style="font-weight: bold; font-size: 17px;">{{ $tm->suppliers->nama }}</p>
                                    @endif
                                </td>
                                <td>{{ $tm -> tglTransaksiMasuk}}</td>
                                <td>
                                    <form action="{{ route('trmasuk.destroy',$tm->idTransaksiMasuk) }}" method="POST">
                                        <a class="btn" style="background-color: #19A7CE; color: #FFFFFF;" href="{{ route('trmasuk.show',$tm->idTransaksiMasuk) }}">Show</a>
                                        <a class="btn" style="background-color: #3461A4; color: #FFFFFF;" href="{{ route('trmasuk.edit',$tm->idTransaksiMasuk) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" style="background-color: #E74C3C; color: #FFFFFF;">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        <?php
                        }
                        if (isset($_POST['filter_tgl'])) {
                        ?>
                            @foreach($filter as $tm)
                            <tr>
                                <td>{{ $tm -> idTransaksiMasuk}}</td>
                                <td>{{ $tm -> idUser}}</td>
                                <td>
                                    {{ $tm -> idSupplier}}
                                    @if($tm->suppliers)
                                    <p style="font-weight: bold; font-size: 17px;">{{ $tm->suppliers->nama }}</p>
                                    @endif
                                </td>
                                <td>{{ $tm -> tglTransaksiMasuk}}</td>
                                <td>
                                    <form action="{{ route('trmasuk.destroy',$tm->idTransaksiMasuk) }}" method="POST">
                                        <a class="btn btn-info" href="{{ route('trmasuk.show',$tm->idTransaksiMasuk) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('trmasuk.edit',$tm->idTransaksiMasuk) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        <?php
                        } else {
                        ?>
                            @foreach($trmasuk as $tm)
                            <tr>
                                <td>{{ $tm -> idTransaksiMasuk}}</td>
                                <td>
                                    {{ $tm -> idUser}}
                                    @if($tm->petugas)
                                    <p style="font-weight: bold; font-size: 17px;">{{ $tm->petugas->nama }}</p>
                                    @endif
                                </td>
                                <td>
                                    {{ $tm -> idSupplier}}
                                    @if($tm->suppliers)
                                    <p style="font-weight: bold; font-size: 17px;">{{ $tm->suppliers->nama }}</p>
                                    @endif
                                </td>
                                <td>{{ $tm -> tglTransaksiMasuk}}</td>
                                <td>
                                    <form action="{{ route('trmasuk.destroy',$tm->idTransaksiMasuk) }}" method="POST">
                                        <a class="btn-action btn-show "href="{{ route('trmasuk.show',$tm->idTransaksiMasuk) }}">Show</a>
                                        <a class="btn-action btn-edit" href="{{ route('trmasuk.edit',$tm->idTransaksiMasuk) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        <?php
                        }
                        ?>
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
                <h4 class="modal-title">Tambah Transaksi Barang Masuk</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('trmasuk.store') }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="idTransaksiMasuk">ID Transaksi Masuk</label>
                        <input type="text" name="idTransaksiMasuk" class="form-control" id="idTransaksiMasuk" aria-describedby="idTransaksiMasuk">
                    </div>
                    <div class="form-group">
                        <label for="idUser">ID User</label>
                        <input type="text" name="idUser" class="form-control" id="idUser" value="{{ Auth::user()->idUser }}">
                        <small>Nama Petugas: {{ Auth::user()->nama }}</small>
                    </div>
                    <div class="form-group">
                        <label for="idSupplier">ID Supplier</label>
                        <select name="idSupplier" class="form-control">
                            @foreach($supplier as $s)
                            <option value="{{ $s -> idSupplier }}">{{ $s -> idSupplier }} || {{ $s -> nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tglTransaksiMasuk">Tanggal Transaksi Masuk</label>
                        <input type="date" name="tglTransaksiMasuk" class="form-control" id="tglTransaksiMasuk" aria-describedby="tglTransaksiMasuk" placeholder="Tanggal Transaksi Masuk">
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
        {{ $trmasuk->links() }}
    </ul>
</div>
@endsection