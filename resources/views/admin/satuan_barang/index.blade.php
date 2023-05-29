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
<section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title font-weight-bold" style="margin-top:15px; color:black;">Satuan Barang</h3><br>
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
                <thead style="background: linear-gradient(to right, #6c63ff, #a892ff);">
                    <tr>
                        <th>ID Satuan</th>
                        <th>Nama Satuan Barang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($adminSatuan as $s)
                    <tr>
                        <td>{{ $s -> idSatuan }}</td>
                        <td>{{ $s -> namaSatuan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-12">
        <ul class="pagination">
            {{ $adminSatuan->links() }}
        </ul>
    </div>
</section>
@endsection