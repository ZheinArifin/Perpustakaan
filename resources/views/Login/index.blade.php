<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="javascript:void(0)"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info alert-rounded" id="success" style="display: none">
            </div>
            <div class="alert alert-warning alert-rounded" id="fail" style="display: none">
            </div>
        </div>
      </div>
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{route('PostLogin')}}" method="post">
        {{csrf_field()}}
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

       
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html>

<?php
if (Session('cek') == "Berhasil") {
  ?>
  <script type="text/javascript">
       location.href="/dashboard";
  </script> 
   <?php
}elseif (Session('cek') == "Gagal") {
  ?>
  <script type="text/javascript">
      $('html, body').animate({ scrollTop: 0 }, 'slow');
      var alert = document.getElementById("fail");
      setTimeout(function() {
          $("#fail").slideDown("slow");
      }, 2000);
      alert.innerHTML= "<i class='fas fa-exclamation-triangle'></i> Email Atau Password Anda Salah!!";

      setTimeout(function() {
          $("#fail").fadeTo(2000, 500).slideUp(500, function(){
          $("#fail").slideUp(500);
          });
      }, 5000);
  </script>
  <?php
}
?>