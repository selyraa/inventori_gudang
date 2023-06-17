@extends('petugas.app_petugas')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('assets/css/kategori.css')}}">
</head>
<br>
<div class="col-md-12 d-flex flex-row justify-content-end" data-toggle="modal" data-target="#myModal">
    <a class="btn rounded-pill" style="background-color: #2D7FC1; color: white; padding: 12px 16px; font-size: 24px; margin-left: -8px;">
        <i class="fas fa-plus"></i>
    </a>
</div>
<section class="content-header">
    <div class="container-fluid">
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title font-weight-bold" style="margin-top: 15px;">Detail Barang Masuk</h3><br>
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
                            <th>ID Detail Masuk</th>
                            <th>ID Transaksi Masuk</th>
                            <th>ID detail Barang</th>
                            <th>Jumlah</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detailmasuk as $dm)
                        <tr>
                            <td>{{ $dm -> idDetailMasuk}}</td>
                            <td>
                                {{ $dm -> idTransaksiMasuk}}
                                @if($dm->trmasuk->suppliers)
                                <p style="font-weight: bold; font-size: 17px;">{{ $dm->trmasuk->suppliers->nama }}</p>
                                @endif
                            </td>
                            <td>
                                {{ $dm -> detailbarang -> idDetailBarang}}
                                @if($dm->detailbarang->barang)
                                <p style="font-weight: bold; font-size: 17px;">{{ $dm->detailbarang->barang->namaBarang }}</p>
                                @endif
                            </td>
                            <td>{{ $dm -> jumlah}}</td>
                            <td>
                                <form action="{{ route('detailmasuk.destroy',$dm->idDetailMasuk) }}" method="POST">
                                    <a class="btn-action btn-show" href="{{ route('detailmasuk.show',$dm->idDetailMasuk) }}">Show</a>
                                    <a class="btn-action btn-edit" href="{{ route('detailmasuk.edit',$dm->idDetailMasuk) }}">Edit</a>
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
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Detail Barang Masuk</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ route('detailmasuk.store') }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="idDetailMasuk">ID Detail Masuk</label>
                        <input type="text" name="idDetailMasuk" class="form-control" id="idDetailMasuk" aria-describedby="idDetailMasuk">
                    </div>
                    <!-- <div class="form-group">
                        <label for="idTransaksiMasuk">ID Transaksi Masuk</label>
                        <select name="idTransaksiMasuk" class="form-control" id="idTransaksiMasuk">
                            <option value="">-- Pilih ID Transaksi Masuk --</option>
                            @foreach($trmasuk as $tm)
                            <option value="{{ $tm->idTransaksiMasuk }}" data-supplier="{{ $tm   ->idSupplier }}">{{ $tm->idTransaksiMasuk }}</option>
                            @endforeach
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label for="idTransaksiMasuk">ID Transaksi Masuk</label>
                        <select name="idTransaksiMasuk" class="form-control" id="idTransaksiMasuk">
                            <option value="">-- Pilih ID Transaksi Masuk --</option>
                            @foreach($trmasuk as $tm)
                            <option value="{{ $tm->idTransaksiMasuk }}" data-supplier="{{ $tm->idSupplier }}">{{ $tm->idTransaksiMasuk }} || {{ $tm->suppliers->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="idDetailBarang">ID Detail Barang</label>
                        <select name="idDetailBarang" class="form-control" id="idDetailBarang">
                            <option value="">-- Pilih ID Detail Barang --</option>
                            @foreach($detail as $d)
                            <option value="{{ $d->idDetailBarang }}">{{ $d->namaBarang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" id="jumlah" aria-describedby="Jumlah">
                    </div>
                    <!-- Tambahkan input tersembunyi untuk menyimpan ID Transaksi Masuk, ID Supplier, dan ID Detail Barang yang terkait -->
                    <input type="hidden" id="selectedTransaksiMasuk" name="selectedTransaksiMasuk">
                    <input type="hidden" id="selectedSupplier" name="selectedSupplier">
                    <input type="hidden" id="selectedDetailBarang" name="selectedDetailBarang">
                    <button type="submit" class="btn-action btn-submit">Submit</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Ketika dropdown idTransaksiMasuk berubah
        $('#idTransaksiMasuk').change(function() {
            // Ambil nilai idTransaksiMasuk dan idSupplier yang dipilih
            var idTransaksiMasuk = $(this).val();
            var idSupplier = $(this).find(':selected').data('supplier');

            // Simpan nilai idSupplier dalam input tersembunyi
            $('#selectedSupplier').val(idSupplier);

            // Lakukan AJAX request untuk mengambil data detail barang sesuai idTransaksiMasuk dan idSupplier yang dipilih
            $.ajax({
                url: '/detail_masuk/fetch',
                type: 'GET',
                dataType: 'json',
                data: {
                    idTransaksiMasuk: idTransaksiMasuk,
                    idSupplier: idSupplier
                },
                success: function(data) {
                    // Kosongkan dropdown idDetailBarang
                    $('#idDetailBarang').empty();

                    // Tambahkan option untuk setiap detail barang yang sesuai dengan idTransaksiMasuk dan idSupplier yang dipilih
                    $.each(data, function(key, value) {
                        $('#idDetailBarang').append('<option value="' + value.idDetailBarang + '">' + value.namaBarang + '</option>');
                    });

                    // Reset input jumlah menjadi kosong
                    $('#jumlah').val('');
                }
            });
        });

        // Fungsi untuk mengisi ulang opsi dropdown ID Transaksi Masuk dan ID Detail Barang saat halaman dimuat
        function populateDropdowns() {
            var idTransaksiMasuk = $('#idTransaksiMasuk').val();
            var idSupplier = $('#idTransaksiMasuk').find(':selected').data('supplier');

            // Lakukan AJAX request untuk mengambil data detail barang sesuai idTransaksiMasuk dan idSupplier yang dipilih
            $.ajax({
                url: "/detail_masuk/fetch",
                type: 'GET',
                dataType: 'json',
                data: {
                    idTransaksiMasuk: idTransaksiMasuk,
                    idSupplier: idSupplier
                },
                success: function(data) {
                    console.log(data);
                    // Kosongkan dropdown idDetailBarang
                    $('#idDetailBarang').empty();

                    // Tambahkan option untuk setiap detail barang yang sesuai dengan idTransaksiMasuk dan idSupplier yang dipilih
                    $.each(data, function(key, value) {
                        console.log(value.detailBarang);
                        $('#idDetailBarang').append('<option value="' + value.idDetailBarang + '">' + value.namaBarang + '</option>');
                    });

                    // Reset input jumlah menjadi kosong
                    $('#jumlah').val('');
                }
            });
        }

        // Panggil fungsi populateDropdowns saat halaman dimuat
        populateDropdowns();

        // Submit form
        $('#myForm').submit(function(e) {
            e.preventDefault();

            // Ambil nilai ID Transaksi Masuk, ID Supplier, ID Detail Barang, dan Jumlah yang terpilih/inputkan
            var idTransaksiMasuk = $('#idTransaksiMasuk').val();
            var idSupplier = $('#selectedSupplier').val();
            var idDetailBarang = $('#idDetailBarang').val();
            var jumlah = $('#jumlah').val();

            // Simpan nilai ID Transaksi Masuk, ID Supplier, dan ID Detail Barang dalam input tersembunyi
            $('#selectedTransaksiMasuk').val(idTransaksiMasuk);
            $('#selectedSupplier').val(idSupplier);
            $('#selectedDetailBarang').val(idDetailBarang);

            // Lakukan proses submit form
            $(this).unbind('submit').submit();
        });
    });
</script>
<div class="col-md-12">
    <ul class="pagination">
        {{ $detailmasuk->links() }}
    </ul>
</div>
@endsection