<!-- View export_pdf.blade.php -->
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

        .total {
            text-align: right;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #000;
        }

        .total strong {
            font-size: 16px;
        }

        .total span {
            font-size: 20px;
            color: #ff7f50;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1 class="title">LAPORAN PENGGANTIAN BARANG</h1>
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
                    <td>{{ $lm->idRetur }}</td>
                    <td>{{ $lm->tglPenggantian }}</td>
                    <td>{{ $lm->jumlahRetur }}</td>
                    <td>{{ $lm->jumlahPenggantian }}</td>
                    <td>{{ $lm->selisihRetur }}</td>
                    <td>Rp. {{ number_format($lm->penguranganProfit, 0, ',', '.') }}</td>
                    <td>{{ $lm->keterangan }}</td>
                </tr>
                @endforeach
            <?php
            } else {
            ?>
                @foreach($laporan as $lm)
                <tr>
                    <td>{{ $lm->idRetur }}</td>
                    <td>{{ $lm->tglPenggantian }}</td>
                    <td>{{ $lm->jumlahRetur }}</td>
                    <td>{{ $lm->jumlahPenggantian }}</td>
                    <td>{{ $lm->selisihRetur }}</td>
                    <td>Rp. {{ number_format($lm->penguranganProfit, 0, ',', '.') }}</td>
                    <td>{{ $lm->keterangan }}</td>
                </tr>
                @endforeach
            <?php
            }
            ?>
        </tbody>
    </table>
    <div class="total">
        <strong>Total Pengurangan Profit:</strong>
        @if($mulai != null && $selesai != null)
        <span>Rp. {{ number_format($totalHargaFilter, 0, ',', '.') }}</span>
        @else
        <span>Rp. {{ number_format($totalHargaLaporan, 0, ',', '.') }}</span>
        @endif
    </div>
</body>

</html>
