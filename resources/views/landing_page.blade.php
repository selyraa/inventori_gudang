<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

  <title>Landing Page | Gudang Lancar Jaya</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{ asset('layout/bootstrap/css/bootstrap.min.css') }}">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('land/css/templatemo-chain-app-dev.css') }}">
  <link rel="stylesheet" href="{{ asset('land/css/animated.css') }}">
  <link rel="stylesheet" href="{{ asset('land/css/owl.css') }}">
  <style>
    .active {
      font-weight: bold;
    }
  </style>
</head>

<body>
  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <img src="{{ asset('land/images/logo_glj.jpg') }}" alt="Chain App Dev">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#home">Home</a></li>
              <li class="scroll-to-section"><a href="#vision">Vision</a></li>
              <li><a href="#about" onclick="scrollToAbout(); setActiveMenu('about')">About</a></li>
              <li><a href="#contact" onclick="scrollToContact(); setActiveMenu('contact')">Contact</a></li>
              <li>
                <div class="gradient-button">
                  <div class="white-button first-button scroll-to-section">
                    <a href="{{ route('login') }}">Sign In <i class="fa fa-sign-in-alt"></i></a>
                    <a href="{{ route('register') }}">Register <i class="fa fa-sign-in-alt"></i></a>
                  </div>
                </div>
              </li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <div class="main-banner wow fadeIn" id="home" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Warehouse Management System</h2>
                    <p>Kemudahan melakukan pelacakan keluar-masuk stok barang serta status stok akurat untuk memudahkan melakukan stock opname, aging stock hingga dead stock.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="{{ asset('land/images/gudang_landing.png') }}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="vision">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <h4>Vision <em>Warehouse Management</em> System</h4>
            <img src="{{ asset('land/images/heading-line-dec.png') }}" alt="">
            <p>Sistem Informasi ini memiliki arah strategis yang jelas, yakni meningkatkan efisiensi dan efektivitas pengelolaan inventori atau stok barang pada gudang.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="service-item first-service">
            <div class="icon"></div>
            <h4>Optimalisasi</h4>
            <p>Mengoptimalkan pengelolaan inventori untuk meningkatkan produktivitas dan efisiensi bisnis.</p>
            <div class="text-button">
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="service-item second-service">
            <div class="icon"></div>
            <h4>Informatif</h4>
            <p>Memberikan informasi yang akuran dan <i>real - time</i> terkait stok barang yang tersedia di gudang.</p>
            <div class="text-button">
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="service-item third-service">
            <div class="icon"></div>
            <h4>Aksesibilitas</h4>
            <p>Menyediakan aksesibilitas yang lebih baik terhadap informasi inventori untuk semua pihak yang berkepentingan.</p>
            <div class="text-button">
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="service-item fourth-service">
            <div class="icon"></div>
            <h4>Akurasi</h4>
            <p>5. Meningkatkan akurasi data inventori dan mengurangi kesalahan inventori yang dapat menyebabkan kehilangan pendapatan.</p>
            <div class="text-button">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="about" class="scroll-to-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 align-self-center">
            <div class="section-heading">
              <h4>About <em>What We Do</em> &amp; Who We Are</h4>
              <img src="{{ asset('land/images/heading-line-dec.png') }}" alt="">
              <p>Selamat datang di website Sistem Informasi Inventori Gudang kami! Kami adalah tim yang berdedikasi untuk menyediakan solusi terbaik dalam mengelola inventori gudang Anda. Dengan pengalaman dan keahlian yang kami miliki, kami menawarkan sistem yang mudah digunakan dan dapat disesuaikan untuk memenuhi kebutuhan unik bisnis Anda. Tujuan kami adalah untuk membantu Anda mengoptimalkan pengelolaan inventori gudang Anda, meningkatkan efisiensi, dan mengurangi biaya operasional. Jangan ragu untuk menghubungi kami jika Anda membutuhkan bantuan atau memiliki pertanyaan tentang layanan kami. Terima kasih telah mempercayai kami sebagai mitra bisnis Anda.</p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="right-image">
              <img src=" {{ asset('land/images/about-right-dec.png') }}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer id="contact" class="scroll-to-section">
      <div class="container">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h4>Contact &amp; Connect Us</h4>
            <p><a href="https://www.google.com/maps/place/State+Polytechnic+of+Malang/@-7.9467136,112.6134797,17z/data=!3m1!4b1!4m15!1m8!3m7!1s0x2e78827687d272e7:0x789ce9a636cd3aa2!2sState+Polytechnic+of+Malang!8m2!3d-7.9467136!4d112.6156684!10e5!16s%2Fg%2F1237vy8k!3m5!1s0x2e78827687d272e7:0x789ce9a636cd3aa2!8m2!3d-7.9467136!4d112.6156684!16s%2Fg%2F1237vy8k">Politeknik Negeri Malang, Indonesia</a></p>
            <p><a href="https://wa.me/6285733744803">Kirim Pesan WhatsApp</a></p>
            <p><a href="mailto:gudanglancarjaya.glj@gmail.com">gudanglancarjaya.glj@gmail.com</a></p>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="copyright-text">
            <p>Copyright © 2023 PT. Gudang Lancar Jaya. All Rights Reserved.</p>
          </div>
        </div>
      </div>
  </div>
  </footer>
  <!-- Scripts -->
  <script src="{{ asset('layout/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('layout/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('land/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('land/js/animation.js') }}"></script>
  <script src="{{ asset('land/js/imagesloaded.js') }}"></script>
  <script src="{{ asset('land/js/popup.js') }}"></script>
  <script src="{{ asset('land/js/custom.js') }}"></script>
  <script>
  // Fungsi untuk mengaktifkan menu dan scrolling ke bagian About
  function scrollToAbout() {
    document.querySelector("#about").scrollIntoView({ behavior: "smooth" });
    setActiveMenu('about');
  }

  // Fungsi untuk mengaktifkan menu dan scrolling ke bagian Contact
  function scrollToContact() {
    document.querySelector("#contact").scrollIntoView({ behavior: "smooth" });
    setActiveMenu('contact');
  }

  // Fungsi untuk mengatur menu aktif
  function setActiveMenu(menu) {
    // Hapus kelas aktif dari semua elemen menu
    var menuItems = document.querySelectorAll("nav ul li a");
    menuItems.forEach(function(item) {
      item.classList.remove("active");
    });

    // Tambahkan kelas aktif pada elemen menu yang dipilih
    var selectedMenu = document.querySelector(`nav ul li a[href="#${menu}"]`);
    selectedMenu.classList.add("active");
  }
</script>



</body>

</html>