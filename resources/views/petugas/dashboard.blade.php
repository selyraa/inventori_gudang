@extends('petugas.app_petugas')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PT. Gudang Lancar Jaya</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghdjkPvT3KUIKqUf7xvePIjIwTkK+" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}">
</head>

<body>
  @section('content')
  <section>

    <div class="card-header" style="background-color: #ffffff;">
      <h1 class="card-title font-weight-bold" style="margin-top: 15px; color: #000; font-size: 20pt">Dashboard</h1>
    </div>

    <div class="row p-5" style="color:black; font-face:cursive; font-weight:normal; font-size:14pt">

      <div class="col-6">
        <div class="row">
          <div class="col-6 pr-3">
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
          <div class="col-6 pr-3">
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
        </div>
        <div class="row">
          <div class="col-6 pr-3">
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
          <div class="col-6 pr-3">
            <div class="info-box mt-3">
              <span class="info-box-icon"><i class="fas fa-coins"></i></span>
              <div class="info-box-content">
                <a href="{{ route('trmasuk.index') }}">
                  <span class="info-box-text font-weight-bold" style="color: #000;">Transaksi Masuk</span>
                  <span class="info-box-number font-weight-bold" style="color: #000;">{{ $trmasuk }}</span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-6 pr-3">
            <div class="info-box mt-3">
              <span class="info-box-icon"><i class="fas fa-chart-bar"></i></span>
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

      <div class="col-6">
        <div class="row">
          <div class="card border-left-custom h-100 shadow py-1 mt-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <img src="{{asset('assets/img/undraw_profile_3.svg')}}" class="rounded-circle" style="width: 150px; height: 150px;">
                </div>
                <div class="col">
                  <div class="h2 mb-4"><b>Selamat Datang<b></div>
                  <div>
                    <h5><i style="color: #2D7FC1; margin-right:7px;" class="fa fa-user ml-3" aria-hidden="true"></i>{{ Auth::user()->nama }}</h5>
                    <h5><i style="color: #2D7FC1; margin-right:7px;" class="fa fa-id-badge ml-3" aria-hidden="true"></i>{{ Auth::user()->username }}</h5>
                    <h5><i style="color: #2D7FC1; margin-right:7px;" class="fa fa-mobile-alt ml-3" aria-hidden="true"></i>{{ Auth::user()->noTelp }}</h5>
                  </div>
                </div>
                <div class="col-auto">
                  <!-- <img src="{{asset('assets/images/regular-table-bottom.png')}}"> -->
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