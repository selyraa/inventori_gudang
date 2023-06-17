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
            <h3 class="card-title font-weight-bold" style="margin-top: 15px;">Transaksi Barang Keluar</h3><br>
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
            <a class="btn rounded-pill" href="{{ route('trkeluar.index') }}" style="background-color: #2D7FC1; color: white;"><i class="fas fa-arrow-left"></i></a>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID Transaksi Keluar</th>
                            <th>ID User</th>
                            <th>ID Toko</th>
                            <th>Tanggal Transaksi Keluar</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($mulai = null || $selesai = null) {
                        ?>
                            @foreach($filter as $tk)
                            <tr>
                                <td>{{ $tk -> idTransaksiKeluar}}</td>
                                <td>
                                    {{ $tk -> idUser}}
                                    @if($tk->petugas)
                                    <p style="font-weight: bold; font-size: 17px;">{{ $tk->petugas->nama }}</p>
                                    @endif
                                </td>
                                <td>
                                    {{ $tk -> idToko}}
                                    @if($tk->toko)
                                    <p style="font-weight: bold; font-size: 17px;">{{ $tk->toko->nama }}</p>
                                    @endif
                                </td>
                                <td>{{ $tk -> tglTransaksiKeluar}}</td>
                                <td>
                                    <form action="{{ route('trkeluar.destroy',$tk->idTransaksiKeluar) }}" method="POST">
                                        <a class="btn" style="background-color: #19A7CE; color: #FFFFFF;" href="{{ route('trkeluar.show',$tk->idTransaksiKeluar) }}">Show</a>
                                        <a class="btn" style="background-color: #3461A4; color: #FFFFFF;" href="{{ route('trkeluar.edit',$tk->idTransaksiKeluar) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" style="background-color: #E74C3C; color: #FFFFFF;">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        <?php
                        }
                        if (isset($_POST['filter_tgl'])) {
                        ?>
                            @foreach($filter as $tk)
                            <tr>
                                <td>{{ $tk -> idTransaksiKeluar}}</td>
                                <td>
                                    {{ $tk -> idUser}}
                                    @if($tk->petugas)
                                    <p style="font-weight: bold; font-size: 17px;">{{ $tk->petugas->nama }}</p>
                                    @endif
                                </td>
                                <td>
                                    {{ $tk -> idToko}}
                                    @if($tk->toko)
                                    <p style="font-weight: bold; font-size: 17px;">{{ $tk->toko->nama }}</p>
                                    @endif
                                </td>
                                <td>{{ $tk -> tglTransaksiKeluar}}</td>
                                <td>
                                    <form action="{{ route('trkeluar.destroy',$tk->idTransaksiKeluar) }}" method="POST">
                                        <a class="btn-action btn-show" href="{{ route('trkeluar.show',$tk->idTransaksiKeluar) }}">Show</a>
                                        <a class="btn-action btn-edit" href="{{ route('trkeluar.edit',$tk->idTransaksiKeluar) }}">Edit</a>
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
                            @foreach($trkeluar as $tk)
                            <tr>
                                <td>{{ $tk -> idTransaksiKeluar}}</td>
                                <td>
                                    {{ $tk -> idUser}}
                                    @if($tk->petugas)
                                    <p style="font-weight: bold; font-size: 17px;">{{ $tk->petugas->nama }}</p>
                                    @endif
                                </td>
                                <td>
                                    {{ $tk -> idToko}}
                                    @if($tk->toko)
                                    <p style="font-weight: bold; font-size: 17px;">{{ $tk->toko->nama }}</p>
                                    @endif
                                </td>
                                <td>{{ $tk -> tglTransaksiKeluar}}</td>
                                <td>
                                    <form action="{{ route('trkeluar.destroy',$tk->idTransaksiKeluar) }}" method="POST">
                                        <a class="btn" style="background-color: #19A7CE; color: #FFFFFF;" href="{{ route('trkeluar.show',$tk->idTransaksiKeluar) }}">Show</a>
                                        <a class="btn" style="background-color: #3461A4; color: #FFFFFF;" href="{{ route('trkeluar.edit',$tk->idTransaksiKeluar) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" style="background-color: #E74C3C; color: #FFFFFF;">Delete</button>
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