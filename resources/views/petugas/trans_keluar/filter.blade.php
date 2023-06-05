@extends('petugas.app_petugas')
@section('content')
@if($showModal)
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
            <table class="table table-hover table-bordered">
                <thead style="background-color: #2D7FC1;">
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
                            <td>{{ $tk -> idUser}}</td>
                            <td>{{ $tk -> idToko}}</td>
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
                            <td>{{ $tk -> idUser}}</td>
                            <td>{{ $tk -> idToko}}</td>
                            <td>{{ $tk -> tglTransaksiKeluar}}</td>
                            <td>
                                <form action="{{ route('trkeluar.destroy',$tk->idTransaksiKeluar) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('trkeluar.show',$tk->idTransaksiKeluar) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('trkeluar.edit',$tk->idTransaksiKeluar) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
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
                            <td>{{ $tk -> idUser}}</td>
                            <td>{{ $tk -> idToko}}</td>
                            <td>{{ $tk -> tglTransaksiKeluar}}</td>
                            <td>
                                <form action="{{ route('trkeluar.destroy',$tk->idTransaksiKeluar) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('trkeluar.show',$tk->idTransaksiKeluar) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('trkeluar.edit',$tk->idTransaksiKeluar) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
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
</section>
@endsection