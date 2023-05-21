@extends('admin.app')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PT Gudang Lancar Jaya</title>
  <link rel="stylesheet" href="{{asset('assets/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
</head>
<body>
@section('content')
<section>
  <div class="row" style="color:black;">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Pengguna</span>
          <span class="info-box-number">{{ $pengguna }}</span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-truck"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Supplier</span>
          <span class="info-box-number">{{ $supplier }}</span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-bill-wave"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Pengeluaran</span>
          <span class="info-box-number">Rp. {{ number_format($totalPengeluaran, 0, ',', '.') }}</span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-bill-wave-alt"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Pemasukan</span>
          <span class="info-box-number">Rp. {{ number_format($totalPemasukan, 0, ',', '.') }}</span>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
</body>
</html>

