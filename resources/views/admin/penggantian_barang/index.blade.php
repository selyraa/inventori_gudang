@extends('admin.app')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
</head>
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
            <h3 class="card-title font-weight-bold" style="margin-top:15px;">Penggantian Barang Retur</h3><br>
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
                            <th>ID Penggantian Barang</th>
                            <th>ID Detail Retur</th>
                            <th>Jumlah Penggantian</th>
                            <th>Selisih Retur</th>
                            <th>Pengurangan Profit</th>
                            <th>Keterangan</th>
                            <th>Tanggal Penggantian</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penggantian as $pg)
                        <tr>
                            <td>{{ $pg -> idPenggantianBarang}}</td>
                            <td>
                                {{ $pg -> idDetailRetur}}
                                @if($pg->detailretur)
                                <p style="font-weight: bold; font-size: 17px;">{{ $pg->detailretur->retur->trmasuk->suppliers->nama }}</p>
                                @endif
                            </td>
                            <td>{{ $pg -> jumlahPenggantian}}</td>
                            <td>{{ $pg -> selisihRetur}}</td>
                            <td>Rp. {{ number_format($pg -> penguranganProfit, 0, ',', '.') }}</td>
                            <td>{{ $pg -> keterangan}}</td>
                            <td>{{ $pg -> tglPenggantian}}</td>
                            <td>
                                <form action="{{ route('penggantianbarang.destroy',$pg->idPenggantianBarang) }}" method="POST">
                                    <a class="btn-action btn-show" href="{{ route('penggantianbarang.show',$pg->idPenggantianBarang) }}">Show</a>
                                    <a class="btn-action btn-edit" href="{{ route('penggantianbarang.edit',$pg->idPenggantianBarang) }}">Edit</a>
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
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Penggantian Barang Retur</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('penggantianbarang.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="idPenggantianBarang">ID Penggantian Barang</label>
                        <input type="text" name="idPenggantianBarang" class="form-control" id="idPenggantianBarang" aria-describedby="idPenggantianBarang">
                    </div>
                    <div class="form-group">
                        <label for="idDetailRetur">ID Detail Retur</label>
                        <select name="idDetailRetur" class="form-control" id="idDetailRetur">
                            <option value="">-- Pilih ID Detail Retur --</option>
                            @foreach($detailretur as $dr)
                            <option value="{{ $dr->idDetailRetur }}" data-supplier="{{ $dr->retur->trmasuk->suppliers->idSuplier }}" data-barang="{{ $dr->detailbarang->barang->idBarang }}">{{ $dr->retur->idRetur }} || {{ $dr->retur->trmasuk->suppliers->nama }} || {{ $dr->detailbarang->barang->namaBarang }}</option>
                            @endforeach
                        </select>
                        <br>
                        <small id="jumlahRetur" class="text-muted font-weight-bold" style="font-size: 18px; color: #6c63ff;"></small>
                    </div>
                    <div class="form-group">
                        <label for="jumlahPenggantian">Jumlah Penggantian</label>
                        <input type="number" name="jumlahPenggantian" class="form-control" id="jumlahPenggantian" aria-describedby="jumlahPenggantian">
                    </div>
                    <div class="form-group">
                        <label for="selisihRetur">Selisih Retur</label>
                        <input type="number" name="selisihRetur" class="form-control" id="selisihRetur" aria-describedby="selisihRetur" readonly>
                    </div>
                    <div class="form-group">
                        <label for="penguranganProfit">Pengurangan Profit</label>
                        <input type="number" name="penguranganProfit" class="form-control" id="penguranganProfit" aria-describedby="penguranganProfit" readonly>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" id="keterangan" aria-describedby="keterangan">
                    </div>
                    <div class="form-group">
                        <label for="tglPenggantian">Tanggal Penggantian</label>
                        <input type="date" name="tglPenggantian" class="form-control" id="tglPenggantian" aria-describedby="tglPenggantian">
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
    document.querySelector('#idDetailRetur').addEventListener('change', function() {
        validateSelisihRetur();
    });

    document.querySelector('#jumlahPenggantian').addEventListener('input', function() {
        validateSelisihRetur();
    });

    function validateSelisihRetur() {
        var idDetailRetur = document.querySelector('select[name="idDetailRetur"]').value;
        var jumlahPenggantian = document.getElementById('jumlahPenggantian').value;
        var jumlahRetur = document.getElementById('jumlahRetur');
        var selisihRetur = document.getElementById('selisihRetur');
        var penguranganProfit = document.getElementById('penguranganProfit');

        if (idDetailRetur !== '') {
            axios.get('/get_detail_retur/' + idDetailRetur)
                .then(function(response) {
                    var detailRetur = response.data;
                    var jumlah = detailRetur.jumlah;
                    var idDetailBarang = detailRetur.idDetailBarang;

                    if (jumlah !== '') {
                        jumlahRetur.textContent = 'Jumlah Retur: ' + jumlah;
                        if (jumlahPenggantian !== '') {
                            var selisih = jumlah - jumlahPenggantian;
                            selisihRetur.value = selisih;

                            axios.get('/get_detail_barang/' + idDetailBarang)
                                .then(function(response) {
                                    var detailBarang = response.data;
                                    var hargaJual = detailBarang.hargaJual;

                                    if (hargaJual !== '' && selisih !== '') {
                                        var pengurangan = selisih * hargaJual;
                                        penguranganProfit.value = pengurangan;
                                    } else {
                                        penguranganProfit.value = '';
                                    }
                                })
                                .catch(function(error) {
                                    console.error(error);
                                    penguranganProfit.value = '';
                                });
                        } else {
                            selisihRetur.value = '';
                            penguranganProfit.value = '';
                        }
                    } else {
                        jumlahRetur.textContent = '';
                        selisihRetur.value = '';
                        penguranganProfit.value = '';
                    }
                })
                .catch(function(error) {
                    console.error(error);
                    jumlahRetur.textContent = 'Terjadi kesalahan saat mengambil detail retur.';
                    selisihRetur.value = '';
                    penguranganProfit.value = '';
                });
        } else {
            jumlahRetur.textContent = '';
            selisihRetur.value = '';
            penguranganProfit.value = '';
        }
    }
</script>

<div class="col-md-12">
    <ul class="pagination">
        {{ $penggantian->links() }}
    </ul>
</div>
@endsection