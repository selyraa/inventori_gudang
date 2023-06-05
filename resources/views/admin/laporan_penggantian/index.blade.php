@extends('admin.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title font-weight-bold" style="margin-top:15px; color:black;">Laporan Penggantian Barang</h3><br>
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
            <div class="row mt-4">
                <div class="col-auto">
                    <form method="post" action="{{ route('lappenggantian') }}" class="form-inline" id="form-filter">
                        @csrf
                        <input type="date" name="tgl_mulai" class="form-control" placeholder="Tanggal Mulai">
                        <input type="date" name="tgl_selesai" class="form-control ml-3" placeholder="Tanggal Selesai">
                        <button type="submit" name="filter_tgl" class="btn btn-info ml-3">Filter</button>
                    </form>
                </div>
                <div class="col-auto">
                    <form method="get" action="{{ route('export_lappenggantian') }}" class="form-inline" id="form-export">
                        @csrf
                        <input type="hidden" name="tgl_mulai" value="{{ session('tgl_mulai') }}">
                        <input type="hidden" name="tgl_selesai" value="{{ session('tgl_selesai') }}">
                        <button type="submit" name="filter_tgl" class="btn btn-info">Export Data</button>
                    </form>
                </div>
            </div>
            <br>
            <table class="table table-hover table-bordered" style="color:white;">
                <thead style="background: linear-gradient(to right, #6c63ff, #a892ff);">
                    <tr>
                        <th>ID Retur</th>
                        <th>Tgl Penggantian</th>
                        <th>Jumlah Retur</th>
                        <th>Jumlah Penggantian</th>
                        <th>Selisih Retur</th>
                        <th>Pengurangan Profit</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody style="color:black;">
                    <?php
                    if ($mulai = null || $selesai = null) {
                    ?>
                        @foreach($laporan as $lm)
                        <tr>
                            <td>{{ $lm -> idRetur}}</td>
                            <td>{{ $lm -> tglPenggantian}}</td>
                            <td>{{ $lm -> jumlahRetur}}</td>
                            <td>{{ $lm -> jumlahPenggantian}}</td>
                            <td>{{ $lm -> selisihRetur}}</td>
                            <td>{{ $lm -> penguranganProfit}}</td>
                            <td>{{ $lm -> keterangan}}</td>
                        </tr>
                        @endforeach
                    <?php
                    }
                    if (isset($_POST['filter_tgl'])) {
                    ?>
                        @foreach($filter as $lm)
                        <tr>
                            <td>{{ $lm -> idRetur}}</td>
                            <td>{{ $lm -> tglPenggantian}}</td>
                            <td>{{ $lm -> jumlahRetur}}</td>
                            <td>{{ $lm -> jumlahPenggantian}}</td>
                            <td>{{ $lm -> selisihRetur}}</td>
                            <td>Rp. {{ number_format($lm -> penguranganProfit, 0, ',', '.') }}</td>
                            <td>{{ $lm -> keterangan}}</td>
                        </tr>
                        @endforeach
                    <?php
                    } else {
                    ?>
                        @foreach($laporan as $lm)
                        <tr>
                            <td>{{ $lm -> idRetur}}</td>
                            <td>{{ $lm -> tglPenggantian}}</td>
                            <td>{{ $lm -> jumlahRetur}}</td>
                            <td>{{ $lm -> jumlahPenggantian}}</td>
                            <td>{{ $lm -> selisihRetur}}</td>
                            <td>Rp. {{ number_format($lm -> penguranganProfit, 0, ',', '.') }}</td>
                            <td>{{ $lm -> keterangan}}</td>
                        </tr>
                        @endforeach
                    <?php
                    }
                    ?>
                </tbody>
                </tbody>

            </table>
        </div>
    </div>
</section>
@endsection