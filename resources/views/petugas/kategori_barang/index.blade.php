@extends('petugas.app_petugas')
@section('content')
<head>
    <link rel="stylesheet" href="{{asset('assets/css/kategori.css')}}">
</head>

<br>
<div class="col-md-12 d-flex flex-row justify-content-end" data-toggle="modal" data-target="#myModal">
    <a class="btn btn-rounded-pill" style="background-color: #2D7FC1; color: white; padding: 12px 16px; font-size: 24px; margin-left: -8px;">
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
            <h3 class="card-title font-weight-bold" style="margin-top: 15px;">Kategori Barang</h3><br>
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
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID Kategori</th>
                            <th>Nama Kategori</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategori_barangs as $k)
                        <tr>
                            <td>{{ $k->idKategori }}</td>
                            <td>{{ $k->namaKategori }}</td>
                            <td>
                                <form action="{{ route('kategori.destroy', $k->idKategori) }}" method="POST">
                                    <a class="btn-action btn-show" href="{{ route('kategori.show', $k->idKategori) }}">Show</a>
                                    <a class="btn-action btn-edit" href="{{ route('kategori.edit', $k->idKategori) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete">Delete</button>
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
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kategori Barang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('kategori.store') }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="idKategori">ID Kategori</label>
                        <input type="text" name="idKategori" class="form-control" id="idKategori" aria-describedby="idKategori">
                    </div>
                    <div class="form-group">
                        <label for="namaKategori">Nama Kategori</label>
                        <input type="text" name="namaKategori" class="form-control" id="namaKategori" aria-describedby="namaKategori">
                    </div>
                    <button type="submit" class="btn btn-submit">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <ul class="pagination">
        {{ $kategori_barangs->links() }}
    </ul>
</div>
@endsection
