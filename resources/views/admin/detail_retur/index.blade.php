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
            <h3 class="card-title font-weight-bold" style="margin-top:15px; color:black; font-size: 24px; font-family:'Helvetica Neue', sans-serif;">Data Detail Retur</h3><br>
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
                        <th>ID Detail Retur</th>
                        <th>ID Retur</th>
                        <th>ID Detail Barang</th>
                        <th>Jumlah Retur</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailretur as $dr)
                    <tr>
                        <td>{{ $dr -> idDetailRetur}}</td>
                        <td>{{ $dr -> idRetur}}</td>
                        <td>{{ $dr -> idDetailBarang}}</td>
                        <td>{{ $dr -> jumlah}}</td>
                        <td>
                            <form action="{{ route('detailretur.destroy',$dr->idDetailRetur) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('detailretur.show',$dr->idDetailRetur) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('detailretur.edit',$dr->idDetailRetur) }}">Edit</a>
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
                <h4 class="modal-title">Tambah Detail Data Retur</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('detailretur.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="idDetailRetur">ID Detail Retur</label>
                        <input type="text" name="idDetailRetur" class="form-control" id="idDetailRetur" aria-describedby="idDetailRetur">
                    </div>
                    <div class="form-group">
                        <label for="idRetur">ID Retur</label>
                        <select name="idRetur" class="form-control" id="idRetur">
                            <option value="">-- Pilih ID Data Retur --</option>
                            @foreach($retur as $r)
                            <option value="{{ $r->idRetur }}">{{ $r->idRetur }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="idDetailBarang">ID Detail Barang</label>
                        <select name="idDetailBarang" class="form-control" id="idDetailBarang">
                            <option value="">-- Pilih ID Detail Barang --</option>
                            @foreach($detailbarang as $db)
                            <option value="{{ $db->idDetailBarang }}">{{ $db->barang->namaBarang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" name="jumlah" class="form-control" id="jumlah" aria-describedby="jumlah">
                        <small id="stokMessage" class="text-danger"></small>
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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.querySelector('#idDetailBarang').addEventListener('change', function() {
        validateStok();
    });

    document.querySelector('#jumlah').addEventListener('input', function() {
        validateStok();
    });

    function validateStok() {
        var idDetailBarang = document.querySelector('select[name="idDetailBarang"]').value;
        var jumlah = parseInt(document.querySelector('input[name="jumlah"]').value);
        var stokMessage = document.getElementById('stokMessage');
        var submitButton = document.querySelector('button[type="submit"]');

        if (idDetailBarang !== '' && !isNaN(jumlah)) {
            axios.get('/retur_stok/' + idDetailBarang)
                .then(function(response) {
                    var stok = response.data.stok;

                    if (stok < jumlah) {
                        stokMessage.textContent = 'Stok tidak cukup! Stok saat ini: ' + stok;
                        submitButton.disabled = true;
                    } else {
                        stokMessage.textContent = '';
                        submitButton.disabled = false;
                    }
                })
                .catch(function(error) {
                    console.error(error);
                    stokMessage.textContent = 'Terjadi kesalahan saat memeriksa stok.';
                    submitButton.disabled = true;
                });
        } else {
            stokMessage.textContent = '';
            submitButton.disabled = true;
        }
    }
</script>
<div class="col-md-12">
    <ul class="pagination">
        {{ $detailretur->links() }}
    </ul>
</div>
@endsection