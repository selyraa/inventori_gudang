<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register</title>

  <!-- Font Icon -->
  <link rel="stylesheet" href="{{asset('assets/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

  <!-- Main css -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body>

  <div class="main">

    <!-- Sign up form -->
    <section class="signup">
      <div class="container">
        <div class="signup-content">
          <div class="signup-form">
            <h2 class="form-title">Sign up</h2>
            <form action="{{ route('register') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="idUser"><i class="zmdi zmdi-account material-icons-name"></i></label>
                <input type="text" name="idUser" id="idUser" placeholder="ID User" />
              </div>
              <div class="form-group">
                <label for="nama"><i class="zmdi zmdi-face"></i></label>
                <input type="text" name="nama" id="nama" placeholder="Your Name" />
              </div>
              <div class="form-group">
                <label for="username"><i class="zmdi zmdi-account-circle"></i></label>
                <input type="text" name="username" id="username" placeholder="Your Username" />
              </div>
              <div class="form-group">
                <label for="umur"><i class="zmdi zmdi-calendar"></i></label>
                <input type="text" name="umur" id="umur" placeholder="Your Age" />
              </div>
              <div class="form-group">
                <label for="alamat"><i class="zmdi zmdi-pin"></i></label>
                <input type="text" name="alamat" id="alamat" placeholder="Your Address" />
              </div>
              <div class="form-group">
                <label for="noTelp"><i class="zmdi zmdi-phone"></i></label>
                <input type="text" name="noTelp" id="noTelp" placeholder="Phone Number" />
              </div>
              <div class="form-group">
                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                <input type="password" name="password" id="password" placeholder="Password" />
              </div>
              <div class="form-group">
                <label for="password_confirmation"><i class="zmdi zmdi-lock-outline"></i></label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password" />
              </div>
              <div class="form-group">
                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
              </div>
              <div class="form-group form-button">
                <input type="submit" class="form-submit" value="Register" />
              </div>
            </form>
          </div>
          <div class="signup-image">
            <img src="{{ asset('assets/images/signup-image.jpg') }}" alt="Sign up image">
            <a href="/login" class="signup-image-link">I am already member</a>
          </div>
        </div>
      </div>
    </section>

  </div>

  <!-- JS -->
  <!-- JS -->
  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>