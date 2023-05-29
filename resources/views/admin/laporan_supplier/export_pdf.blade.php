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
                <h1>LAPORAN DATA SUPPLIER</h1>
                <h2 style="margin-top: 30px">PT. GUDANG LANCAR JAYA</h2>
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
                    <th>ID Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                </tr>
            </thead>
            <tbody>
                @foreach($supplier as $s)
                <tr>
                    <td>{{ $s -> idSupplier}}</td>
                    <td>{{ $s -> nama}}</td>
                    <td>{{ $s -> alamat}}</td>
                    <td>{{ $s -> noTelp}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>

</html>