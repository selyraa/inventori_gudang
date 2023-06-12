@extends('petugas.app_petugas')
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
        background-color: #9BA4B5;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .pagination li a:hover {
        background-color: #737f8f;
    }

    .pagination .active a {
        background-color: #737f8f;
    }
</style>
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
            <h3 class="card-title font-weight-bold" style="margin-top: 15px;">Detail Barang Keluar</h3><br>
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
                <thead style=" background-color: #2D7FC1;">
                    <tr>
                        <th>ID Detail Keluar</th>
                        <th>ID Transaksi Keluar</th>
                        <th>ID Detail Barang</th>
                        <th>Jumlah</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detailkeluar as $dk)
                    <tr>
                        <td>{{ $dk -> idDetailKeluar}}</td>
                        <td>{{ $dk -> idTransaksiKeluar}}</td>
                        <td>{{ $dk -> idDetailBarang}}</td>
                        <td>{{ $dk -> jumlah}}</td>
                        <td>
                            <form action="{{ route('detailkeluar.destroy',$dk->idDetailKeluar) }}" method="POST">
                                <a class="btn" style="background-color: #19A7CE; color: #FFFFFF;" href="{{ route('detailkeluar.show',$dk->idDetailKeluar) }}">Show</a>
                                <a class="btn" style="background-color: #3461A4; color: #FFFFFF;" href="{{ route('detailkeluar.edit',$dk->idDetailKeluar) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" style="background-color: #E74C3C; color: #FFFFFF;">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Detail Barang Keluar</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('detailkeluar.store') }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="idDetailKeluar">ID Detail Keluar</label>
                        <input type="text" name="idDetailKeluar" class="form-control" id="idDetailKeluar" aria-describedby="idDetailKeluar">
                    </div>
                    <div class="form-group">
                        <label for="idTransaksiKeluar">ID Transaksi Keluar</label>
                        <select name="idTransaksiKeluar" class="form-control">
                            <option value="">-- Pilih ID Transaksi Keluar --</option>
                            @foreach($trkeluar as $tk)
                            <option value="{{ $tk->idTransaksiKeluar }}">{{ $tk->idTransaksiKeluar }}</option>
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
                        <input type="number" name="jumlah" class="form-control" id="jumlah" aria-describedby="jumlah">
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
            axios.get('/get_stok/' + idDetailBarang)
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
        {{ $detailkeluar->links() }}
    </ul>
</div>
@endsection