@extends('petugas.app_petugas')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PT. Gudang Lancar Jaya</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghdjkPvT3KUIKqUf7xvePIjIwTkK+" crossorigin="anonymous">
</head>
<body>
@section('content')
<section>
  <div class="row" style="color:black; font face:cursive; font-weight:normal; font-size:14pt">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Petugas</span>
                <span class="info-box-number">{{ $petugas }}</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-box"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Barang</span>
                <span class="info-box-number">{{ $barang }}</span>
              </div>
            </div>
          </div>
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-store"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Toko</span>
                <span class="info-box-number">{{ $toko }}</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-sign-in-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Transaksi Masuk</span>
                <span class="info-box-number">{{ $trmasuk }}</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-sign-out-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Transaksi Keluar</span>
                <span class="info-box-number">{{ $trkeluar }}</span>
              </div>
            </div>
          </div>
          
  </div>
</section>
@endsection
  
</body>
</html>