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
        <h1 class="title">LAPORAN DATA SUPPLIER</h1>
        <h2 class="subtitle">PT. GUDANG LANCAR JAYA</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID Supplier</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>No Telp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($supplier as $s)
            <tr>
                <td>{{ $s->idSupplier }}</td>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->alamat }}</td>
                <td>{{ $s->noTelp }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
