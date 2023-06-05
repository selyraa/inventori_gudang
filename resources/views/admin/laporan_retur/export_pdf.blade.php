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
                <h1>LAPORAN RETUR BARANG</h1>
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
                    <th>Tgl Retur</th>
                    <th>Nama Admin</th>
                    <th>Nama Supplier</th>
                    <th>Nama Barang</th>
                    <th>Tgl Produksi</th>
                    <th>Tgl Expired</th>
                    <th>Jumlah Retur</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($mulai != null && $selesai != null) {
                ?>
                    @foreach($filter as $lm)
                    <tr>
                        <td>{{ $lm -> idRetur}}</td>
                        <td>{{ $lm -> tglRetur}}</td>
                        <td>{{ $lm -> namaAdmin}}</td>
                        <td>{{ $lm -> nama}}</td>
                        <td>{{ $lm -> namaBarang}}</td>
                        <td>{{ $lm -> tglProduksi}}</td>
                        <td>{{ $lm -> tglExp}}</td>
                        <td>{{ $lm -> jumlahRetur}}</td>
                    </tr>
                    @endforeach
                <?php
                } else {
                ?>
                    @foreach($laporan as $lm)
                    <tr>
                        <td>{{ $lm -> idRetur}}</td>
                        <td>{{ $lm -> tglRetur}}</td>
                        <td>{{ $lm -> namaAdmin}}</td>
                        <td>{{ $lm -> nama}}</td>
                        <td>{{ $lm -> namaBarang}}</td>
                        <td>{{ $lm -> tglProduksi}}</td>
                        <td>{{ $lm -> tglExp}}</td>
                        <td>{{ $lm -> jumlahRetur}}</td>
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