@extends('admin.app')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PT. Gudang Lancar Jaya</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghdjkPvT3KUIKqUf7xvePIjIwTkK+" crossorigin="anonymous">
  <style>
    .card {
      width: 100%;
    }

    .info-box {
      background-color: rgba(255, 255, 255, 0.);
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
      transition: all 0.3s ease;
    }

    .info-box:hover {
      transform: translateY(-3px);
      box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    }

    .border-left-custom {
      border-left: 8px solid #6c63ff !important;
    }
  </style>
</head>

<body>
  @section('content')
  <section>

    <div class="card-header" style="background-color: #ffffff;">
      <h1 class="card-title font-weight-bold" style="margin-top: 15px; color: #000; font-size: 20pt">Dashboard</h1>
    </div>

    <div class="row p-5" style="color:black; font-family:Arial; font-weight:normal; font-size:14pt">

      <div class="col-6">
        <div class="row">
          <div class="col-6 pr-3">
            <div class="info-box mt-3">
              <span class="info-box-icon" style="background: linear-gradient(to right, #6c63ff, #a892ff); color: #fff;"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <a href="{{ route('admin.index') }}">
                  <span class="info-box-text font-weight-bold" style="color: #000;">Pengguna</span>
                  <span class="info-box-number font-weight-bold" style="color: #000;">{{ $pengguna }}</span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-6 pr-3">
            <div class="info-box mt-3">
              <span class="info-box-icon" style="background: linear-gradient(to right, #6c63ff, #a892ff); color: #fff;"><i class="fas fa-handshake"></i></span>
              <div class="info-box-content">
                <a href="{{ route('lapSupplier') }}">
                  <span class="info-box-text font-weight-bold" style="color: #000;">Supplier</span>
                  <span class="info-box-number font-weight-bold" style="color: #000;">{{ $supplier }}</span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6 pr-3">
            <div class="info-box mt-3">
              <span class="info-box-icon" style="background: linear-gradient(to right, #6c63ff, #a892ff); color: #fff;"><i class="fas fa-coins"></i></span>

              <div class="info-box-content">
                <a href="{{ route('lapkeluar') }}">
                  <span class="info-box-text font-weight-bold" style="color: #000;">Pemasukan</span>
                  <span class="info-box-number font-weight-bold mt-0 mb-0" style="color: #000;">Rp. {{ number_format($totalPemasukan, 0, ',', '.') }}</span>
                  <p class="mt-0 mb-0" style="color: #000; font-size: 11px;">Periode {{ $tanggalAwal }} s/d {{ $tanggalAkhir }}</p>
                </a>
              </div>
            </div>
          </div>
          <div class="col-6 pr-3">
            <div class="info-box mt-3">
              <span class="info-box-icon" style="background: linear-gradient(to right, #6c63ff, #a892ff); color: #fff;"><i class="fas fa-chart-bar"></i></span>
              <div class="info-box-content">
                <a href="{{ route('lapmasuk') }}" style="text-decoration: none;">
                  <span class="info-box-text font-weight-bold" style="color: #000;">Pengeluaran</span>
                  <span class="info-box-number font-weight-bold" style="color: #000;">Rp. {{ number_format($totalPengeluaran, 0, ',', '.') }}</span>
                  <p class="mt-0 mb-0" style="color: #000; font-size: 11px;">Periode {{ $tanggalPertama }} s/d {{ $tanggalTerakhir }}</p>
                </a>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6 pr-3">
            <div class="info-box mt-3">
              <span class="info-box-icon" style="background: linear-gradient(to right, #6c63ff, #a892ff); color: #fff;"><i class="fas fa-exchange-alt"></i></span>
              <div class="info-box-content">
                <a href="{{ route('lapretur') }}">
                  <span class="info-box-text font-weight-bold" style="color: #000;">Retur</span>
                  <span class="info-box-number font-weight-bold mt-0 mb-0" style="color: #000;">{{ $retur }}</span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-6 pr-3">
            <div class="info-box mt-3">
              <span class="info-box-icon" style="background: linear-gradient(to right, #6c63ff, #a892ff); color: #fff;"><i class="fas fa-chart-line fa-flip-vertical"></i></span>
              <div class="info-box-content">
                <a href="{{ route('lappenggantian') }}" style="text-decoration: none;">
                  <span class="info-box-text font-weight-bold" style="color: #000;">Pengurangan Profit</span>
                  <span class="info-box-number font-weight-bold" style="color: #000;">Rp. {{ number_format($penurunanProfit, 0, ',', '.') }}</span>
                </a>
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
                    <h5><i style="color: #6c63ff; margin-right:7px;" class="fa fa-user ml-3" aria-hidden="true"></i>{{ Auth::user()->nama }}</h5>
                    <h5><i style="color: #6c63ff; margin-right:7px;" class="fa fa-id-badge ml-3" aria-hidden="true"></i>{{ Auth::user()->username }}</h5>
                    <h5><i style="color: #6c63ff; margin-right:7px;" class="fa fa-mobile-alt ml-3" aria-hidden="true"></i>{{ Auth::user()->noTelp }}</h5>
                  </div>
                </div>
                <div class="col-auto">
                  <!-- <img src="{{asset('assets/images/regular-table-bottom.png')}}"> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-12 mt-5">
          <canvas id="chartPenguranganProfit"></canvas>
        </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <script>
    var dataPenguranganProfit = {!! json_encode($dataPenguranganProfit) !!};

    // Mengubah format data ke dalam bentuk yang dapat digunakan oleh Chart.js
    var labels = [];
    var values = [];

    dataPenguranganProfit.forEach(function(data) {
      labels.push('Bulan ' + data.Bulan);
      values.push(data.TotalPenguranganProfit);
    });

    // Menggambar chart menggunakan Chart.js
    var ctx = document.getElementById('chartPenguranganProfit').getContext('2d');
    var chartPenguranganProfit = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Pengurangan Profit',
          data: values,
          backgroundColor: 'rgba(108, 99, 255, 0.8)',
          borderColor: 'rgba(108, 99, 255, 1)',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        // plugins:{
        //   title: {
        //     display: true,
        //     text: 'Pengurangan Profit',
        //     font: {
        //       family: 'sans-serif',
        //       size: 16
        //     }
        //   }
        // },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              font: {
                family: 'sans-serif',
                size: 12,
                weight: 'bold'
              }
            }
          },
          x: {
            ticks: {
              font: {
                family: 'sans-serif',
                size: 12,
                weight: 'bold'
              }
            }
          }
        },
        onClick: function(e) {
            // Lakukan routing ke laman penggantian
            window.location.href = "{{ route('lappenggantian') }}";
          }
      }
    });
  </script>
  @endsection
</body>

</html>