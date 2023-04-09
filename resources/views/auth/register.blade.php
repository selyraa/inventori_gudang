<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
<<<<<<< HEAD
  <link rel="stylesheet" href="{{asset('assets/plugins/iCheck/icheck.min.css')}}">
=======
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
>>>>>>> 76b934f3e893845ff85a3f6648dd73a4bff9729c
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
<<<<<<< HEAD
    <a href="../../index2.html"><b>PT. Gudang Lancar Jaya</b></a>
=======
    <a href="../../index2.html"><b>Admin</b>LTE</a>
>>>>>>> 76b934f3e893845ff85a3f6648dd73a4bff9729c
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name ="idUser" class="form-control @error('idUser') is-invalid @enderror"  placeholder="ID User">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" name ="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
<<<<<<< HEAD
              <span class="fas fa-user"></span>
=======
              <span class="fas fa-lock"></span>
>>>>>>> 76b934f3e893845ff85a3f6648dd73a4bff9729c
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="integer" name= "umur" class="form-control @error('umur') is-invalid @enderror" placeholder="Umur">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat">
          <div class="input-group-append">
            <div class="input-group-text">
<<<<<<< HEAD
              <span class="fas fa-user"></span>
=======
              <span class="fas fa-lock"></span>
>>>>>>> 76b934f3e893845ff85a3f6648dd73a4bff9729c
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="noTelp" class="form-control @error('noTelp') is-invalid @enderror" placeholder="No Telepon">
          <div class="input-group-append">
            <div class="input-group-text">
<<<<<<< HEAD
              <span class="fas fa-user"></span>
=======
              <span class="fas fa-lock"></span>
>>>>>>> 76b934f3e893845ff85a3f6648dd73a4bff9729c
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" placeholder="Retype password">
          @error('password') {{ $message }} @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="/login" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<<<<<<< HEAD
<script src="{{asset('assets/plugins/jQuery/jQuery-2.1.3.min.js')}}"></script>
=======
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
>>>>>>> 76b934f3e893845ff85a3f6648dd73a4bff9729c
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
<<<<<<< HEAD

=======
>>>>>>> 76b934f3e893845ff85a3f6648dd73a4bff9729c
