@extends('admin.app')
@section('content')
<head>
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
</head>
@if($showModal)
<script>
    $(document).ready(function() {
        $('#modalEdit').modal('show');
    });
</script>
@endif
<div class="modal fade" id="modalEdit">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Penggantian Retur Barang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('penggantianbarang.update', $penggantian->idPenggantianBarang) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="idPenggantianBarang">ID Penggantian Barang</label>
                        <input type="text" name="idPenggantianBarang" class="form-control" id="idPenggantianBarang" value="{{ old('idPenggantianBarang', $penggantian->idPenggantianBarang) }}" aria-describedby="idPenggantianBarang">
                    </div>
                    <div class="form-group">
                        <label for="idDetailRetur">ID Detail Retur</label>
                        <select name="idDetailRetur" class="form-control" id="idDetailRetur">
                            <option value="">-- Pilih ID Detail Retur --</option>
                            @foreach($detailretur as $dr)
                            <option value="{{ $dr->idDetailRetur }}" data-supplier="{{ $dr->retur->trmasuk->suppliers->idSuplier }}">{{ $dr->idDetailRetur }} || {{ $dr->retur->trmasuk->suppliers->nama }}</option>
                            @endforeach
                        </select>
                        <br>
                        <small id="jumlahRetur" class="text-muted font-weight-bold" style="font-size: 18px; color: #6c63ff;"></small>
                    </div>
                    <div class="form-group">
                        <label for="jumlahPenggantian">Jumlah Penggantian</label>
                        <input type="number" name="jumlahPenggantian" class="form-control" id="jumlahPenggantian" value="{{ old('jumlahPenggantian', $penggantian->jumlahPenggantian) }}" aria-describedby="jumlahPenggantian">
                    </div>
                    <div class="form-group">
                        <label for="selisihRetur">Selisih Retur</label>
                        <input type="number" name="selisihRetur" class="form-control" id="selisihRetur" value="{{ old('selisihRetur', $penggantian->selisihRetur) }}" aria-describedby="selisihRetur" readonly>
                    </div>
                    <div class="form-group">
                        <label for="penguranganProfit">Pengurangan Profit</label>
                        <input type="number" name="penguranganProfit" class="form-control" id="penguranganProfit" value="{{ old('penguranganProfit', $penggantian->penguranganProfit) }}" aria-describedby="penguranganProfit" readonly>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" id="keterangan" value="{{ old('keterangan', $penggantian->keterangan) }}" aria-describedby="keterangan">
                    </div>
                    <div class="form-group">
                        <label for="tglPenggantian">Tanggal Penggantian</label>
                        <input type="date" name="tglPenggantian" class="form-control" id="tglPenggantian" value="{{ old('tglPenggantian', $penggantian->tglPenggantian) }}" aria-describedby="tglPenggantian">
                    </div>
                    <button type="submit" class="btn-action btn-submit">Submit</button>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('penggantianbarang.index') }}">Kembali</a>
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

@endsection