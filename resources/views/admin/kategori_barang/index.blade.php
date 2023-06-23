@extends('admin.app')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
</head>

<section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title font-weight-bold" style="margin-top:15px; color:black; font-size: 24px; font-family:'Helvetica Neue', sans-serif;">Kategori Barang</h3><br>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($adminKategori as $k)
                        <tr>
                            <td>{{ $k -> idKategori}}</td>
                            <td>{{ $k -> namaKategori}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <ul class="pagination">
            {{ $adminKategori->links() }}
        </ul>
    </div>
</section>
@endsection