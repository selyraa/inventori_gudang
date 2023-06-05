<!-- View export_pdf.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export to PDF</title>

</head>

<body>
    <div class="row">
        <div class="col-lg-12 margin-tb" style="justify-content: center; align-items: center; text-align: center;">
            <div class="pull-left mt-2">
                <h1>LAPORAN PENGGANTIAN BARANG</h1>
                <h2 style="margin-top: 0px">PT. GUDANG LANCAR JAYA</h2>
                <?php
                if ($mulai != null && $selesai != null) {
                ?>
                    <h3>Periode Tanggal {{ $mulai }} s/d {{ $selesai }}</h3>
                <?php
                } else {
                ?>
                    <h3>Periode Tanggal {{ $tanggalPertama }} s/d {{ $tanggalTerakhir }}</h3>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <section class="content-header">
        <div class="container-fluid">
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <!-- Default box -->
        <table border="1" style="color:black;">
            <thead style="background-color: black; color:white;">
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
            <tbody>
                <?php
                if ($mulai != null && $selesai != null) {
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
        </table>
    </section>
</body>

</html>