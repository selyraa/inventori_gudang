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
                <h1>LAPORAN BARANG MASUK</h1>
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
                    <th>ID Trans Masuk</th>
                    <th>Tgl Masuk</th>
                    <th>Nama Petugas</th>
                    <th>Nama Supplier</th>
                    <th>Nama Barang</th>
                    <th>Tgl Produksi</th>
                    <th>Tgl Expired</th>
                    <th>Harga Satuan</th>
                    <!-- <th>Harga Jual</th> -->
                    <th>Jumlah Masuk</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($filter as $lm)
                <tr>
                    <td>{{ $lm -> idTransaksiMasuk}}</td>
                    <td>{{ $lm -> tglTransaksiMasuk}}</td>
                    <td>{{ $lm -> namaPetugas}}</td>
                    <td>{{ $lm -> nama}}</td>
                    <td>{{ $lm -> namaBarang}}</td>
                    <td>{{ $lm -> tglProduksi}}</td>
                    <td>{{ $lm -> tglExp}}</td>
                    <td>{{ $lm -> hargaBeli}}</td>
                    <td>{{ $lm -> stok}}</td>
                    <!-- <td>{{ $lm -> hargaJual}}</td> -->
                    <td>{{ $lm -> totalHarga}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>

</html>