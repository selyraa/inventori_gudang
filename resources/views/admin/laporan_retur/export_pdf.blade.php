<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export to PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .subtitle {
            font-size: 16px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        thead {
            background-color: #000;
            color: #fff;
        }

        th {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1 class="title">LAPORAN RETUR BARANG</h1>
        <h2 class="subtitle">PT. GUDANG LANCAR JAYA</h2>
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

    <table>
        <thead>
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
</body>

</html>