@extends('petugas.app_petugas')
@section('content')
@if($showModal)

<head>
    <link rel="stylesheet" href="{{asset('assets/css/kategori.css')}}">
</head>
<script>
    $(document).ready(function() {
        $('#modalFilter').modal('show');
    });
</script>
@endif
<section class="content">
    <div class="card" style="margin-top: 30px;">
        <div class="card-header">
            <h3 class="card-title font-weight-bold" style="margin-top: 15px;">Transaksi Barang Masuk</h3><br>
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
            <a class="btn rounded-pill" href="{{ route('trmasuk.index') }}" style="background-color: #2D7FC1; color: white;"><i class="fas fa-arrow-left"></i></a>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID Transaksi Masuk</th>
                            <th>ID User</th>
                            <th>ID Supplier</th>
                            <th>Tanggal Transaksi Masuk</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($mulai = null || $selesai = null) {
                        ?>
                            @foreach($trmasuk as $tm)
                            <tr>
                                <td>{{ $tm -> idTransaksiMasuk}}</td>
                                <td>
                                    {{ $tm -> idUser}}
                                    @if($tm->petugas)
                                    <p style="font-weight: bold; font-size: 17px;">{{ $tm->petugas->nama }}</p>
                                    @endif
                                </td>
                                <td>
                                    {{ $tm -> idSupplier}}
                                    @if($tm->suppliers)
                                    <p style="font-weight: bold; font-size: 17px;">{{ $tm->suppliers->nama }}</p>
                                    @endif
                                </td>
                                <td>{{ $tm -> tglTransaksiMasuk}}</td>
                                <td>
                                    <form action="{{ route('trmasuk.destroy',$tm->idTransaksiMasuk) }}" method="POST">
                                        <a class="btn-action btn-show" href="{{ route('trmasuk.show',$tm->idTransaksiMasuk) }}">Show</a>
                                        <a class="btn-action btn-edit" href="{{ route('trmasuk.edit',$tm->idTransaksiMasuk) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        <?php
                        }
                        if (isset($_POST['filter_tgl'])) {
                        ?>
                            @foreach($filter as $tm)
                            <tr>
                                <td>{{ $tm -> idTransaksiMasuk}}</td>
                                <td>
                                    {{ $tm -> idUser}}
                                    @if($tm->petugas)
                                    <p style="font-weight: bold; font-size: 17px;">{{ $tm->petugas->nama }}</p>
                                    @endif
                                </td>
                                <td>
                                    {{ $tm -> idSupplier}}
                                    @if($tm->suppliers)
                                    <p style="font-weight: bold; font-size: 17px;">{{ $tm->suppliers->nama }}</p>
                                    @endif
                                </td>
                                <td>{{ $tm -> tglTransaksiMasuk}}</td>
                                <td>
                                    <form action="{{ route('trmasuk.destroy',$tm->idTransaksiMasuk) }}" method="POST">
                                        <a class="btn-action btn-show" href="{{ route('trmasuk.show',$tm->idTransaksiMasuk) }}">Show</a>
                                        <a class="btn-action btn-edit" href="{{ route('trmasuk.edit',$tm->idTransaksiMasuk) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        <?php
                        } else {
                        ?>
                            @foreach($trmasuk as $tm)
                            <tr>
                                <td>{{ $tm -> idTransaksiMasuk}}</td>
                                <td>
                                    {{ $tm -> idUser}}
                                    @if($tm->petugas)
                                    <p style="font-weight: bold; font-size: 17px;">{{ $tm->petugas->nama }}</p>
                                    @endif
                                </td>
                                <td>
                                    {{ $tm -> idSupplier}}
                                    @if($tm->suppliers)
                                    <p style="font-weight: bold; font-size: 17px;">{{ $tm->suppliers->nama }}</p>
                                    @endif
                                </td>
                                <td>{{ $tm -> tglTransaksiMasuk}}</td>
                                <td>
                                    <form action="{{ route('trmasuk.destroy',$tm->idTransaksiMasuk) }}" method="POST">
                                        <a class="btn-action btn-show" href="{{ route('trmasuk.show',$tm->idTransaksiMasuk) }}">Show</a>
                                        <a class="btn-action btn-edit" href="{{ route('trmasuk.edit',$tm->idTransaksiMasuk) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection