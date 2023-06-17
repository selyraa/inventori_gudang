@extends('admin.app')
@section('content')
<style>
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
        margin-bottom: 10px;
        list-style-type: none;
        padding: 0;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination li a {
        display: block;
        padding: 8px 12px;
        text-decoration: none;
        color: #fff;
        background-color: #6c63ff;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .pagination li a:hover {
        background-color: #a892ff;
    }

    .pagination .active a {
        background-color: #a892ff;
    }
</style>
<br>
<div class="col-md-12 d-flex flex-row justify-content-end" data-toggle="modal" data-target="#myModal">
    <a class="btn rounded-pill" style="background: linear-gradient(to right, #6c63ff, #a892ff); color: white; padding: 12px 16px; font-size: 24px; margin-left: -8px;">
        <i class="fas fa-plus"></i>
    </a>
</div>
<section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title font-weight-bold" style="margin-top:15px; color:black; font-size: 24px; font-family:'Helvetica Neue', sans-serif;">Data Retur</h3><br>
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
            <table class="table table-hover table-bordered" style="color:black;">
                <thead style="background: linear-gradient(to right, #6c63ff, #a892ff); color:white;">
                    <tr>
                        <th>ID Retur</th>
                        <th>ID Transaksi Masuk</th>
                        <th>ID User</th>
                        <th>Tanggal Retur</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($retur as $r)
                    <tr>
                        <td>{{ $r -> idRetur}}</td>
                        <td>{{ $r -> idTransaksiMasuk}}</td>
                        <td>{{ $r -> idUser}}</td>
                        <td>{{ $r -> tglRetur}}</td>
                        <td>
                            <form action="{{ route('retur.destroy',$r->idRetur) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('retur.show',$r->idRetur) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('retur.edit',$r->idRetur) }}">Edit</a>
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
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Retur</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('retur.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="idRetur">ID Retur</label>
                        <input type="text" name="idRetur" class="form-control" id="idRetur" aria-describedby="idRetur">
                    </div>
                    <div class="form-group">
                        <label for="idTransaksiMasuk">ID Transaksi Masuk</label>
                        <select name="idTransaksiMasuk" class="form-control" id="idTransaksiMasuk">
                            <option value="">-- Pilih ID Transaksi Masuk --</option>
                            @foreach($trmasuk as $tm)
                            <option value="{{ $tm->idTransaksiMasuk }}" data-supplier="{{ $tm->supplier->idSupplier }}">{{ $tm->idTransaksiMasuk }} || {{ $tm->supplier->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="idUser">ID User</label>
                        <input type="text" name="idUser" class="form-control" id="idUser" value="{{ Auth::user()->idUser }}">
                        <small>Nama Admin: {{ Auth::user()->nama }}</small>
                    </div>
                    <div class="form-group">
                        <label for="tglRetur">Tanggal Retur</label>
                        <input type="date" name="tglRetur" class="form-control" id="tglRetur" aria-describedby="tglRetur">
                    </div>
                    <button type="submit" class="btn rounded" style="background-color: #282A3A; color: white;">Submit</button>
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
        {{ $retur->links() }}
    </ul>
</div>
@endsection