@extends('petugas.app_petugas')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PT. Gudang Lancar Jaya</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghdjkPvT3KUIKqUf7xvePIjIwTkK+" crossorigin="anonymous">
  <style>
    .card-body {
      height: calc(114vh - 140px);
      overflow-y: auto; 
    }
    .info-box {
      background-color: rgba(255, 255, 255, 0.);
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); 
      transition: all 0.3s ease; 
    }

    .info-box-icon{
      background: linear-gradient(to bottom, #2D7FC1, #007bff);
      color: #fff;
    }

    .info-box:hover {
      transform: translateY(-3px);
      box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    }
    
  </style>
</head>

<body>
  @section('content')
  <section>
    <div class="card">
      <div class="card-header" style="background-color: #ffffff;">
        <h1 class="card-title font-weight-bold" style="margin-top: 15px; color: #000; font-size: 20pt">Dashboard</h1>
      </div>
      <div class="card-body" style="background-color: #ffffff;">
        <div class="row" style="color:black; font face:cursive; font-weight:normal; font-size:14pt">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mt-3">
              <span class="info-box-icon"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <a href="{{ route('petugas.index') }}">
                  <span class="info-box-text font-weight-bold" style="color: #000;">Petugas</span>
                  <span class="info-box-number font-weight-bold" style="color: #000;">{{ $petugas }}</span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mt-3">
              <span class="info-box-icon" style="background-color: #3461A4; color: #fff;"><i class="fas fa-box"></i></span>

              <div class="info-box-content">
                <a href="{{ route('barang.index') }}">
                  <span class="info-box-text font-weight-bold" style="color: #000;">Barang</span>
                  <span class="info-box-number font-weight-bold" style="color: #000;">{{ $barang }}</span>
                </a>
              </div>
            </div>
          </div>
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mt-3">
              <span class="info-box-icon"><i class="fas fa-store"></i></span>

              <div class="info-box-content">
                <a href="{{ route('toko.index') }}">
                  <span class="info-box-text font-weight-bold" style="color: #000;">Toko</span>
                  <span class="info-box-number font-weight-bold" style="color: #000;">{{ $toko }}</span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mt-3">
              <span class="info-box-icon"><i class="fas fa-sign-in-alt"></i></span>

              <div class="info-box-content">
                <a href="{{ route('trmasuk.index') }}">
                  <span class="info-box-text font-weight-bold" style="color: #000;">Transaksi Masuk</span>
                  <span class="info-box-number font-weight-bold" style="color: #000;">{{ $trmasuk }}</span>
                </a>

              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mt-3">
              <span class="info-box-icon"><i class="fas fa-sign-out-alt"></i></span>

              <div class="info-box-content">
                <a href="{{ route('trkeluar.index') }}">
                  <span class="info-box-text font-weight-bold" style="color: #000;">Transaksi Keluar</span>
                  <span class="info-box-number font-weight-bold" style="color: #000;">{{ $trkeluar }}</span>
                </a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  @endsection

</body>

</html>