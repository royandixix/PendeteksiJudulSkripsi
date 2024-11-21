<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LOGIN | Log in</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
    /* Layout dasar untuk membagi halaman menjadi dua kolom */
    body {
      margin: 0;
      font-family: 'Source Sans Pro', sans-serif;
      height: 100vh; /* Membuat seluruh tinggi layar digunakan */
      display: flex;
      flex-direction: row; /* Membuat dua kolom horizontal */
    }

    /* Background image pada sisi kiri */
    .background {
      flex: 1; /* Memberikan lebar 50% untuk background */
      background-image: url('dist/img/background.jpg'); /* Ganti dengan path gambar Anda */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh; /* Menjaga gambar latar belakang mengisi seluruh layar */
    }

    /* Kolom untuk form login */
    .login-box-container {
      flex: 1; /* Memberikan lebar 50% untuk form login */
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* Tampilan box login */
    .login-box {
      width: 100%;
      max-width: 400px;
      padding: 40px;
      background-color: rgba(255, 255, 255, 0.8); /* Membuat latar belakang sedikit transparan */
      border-radius: 8px;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .login-logo a {
      font-size: 36px;
      color: #007bff;
      font-weight: bold;
      text-align: center;
    }
  </style>
</head>
<body>  

<!-- Kolom untuk background -->
<div class="background"></div>

<!-- Kolom untuk login form -->
<div class="login-box-container">
  <div class="login-box">
    <div class="login-logo">
      <a href="index2.html"><b>Halaman</b>Login</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="config/login1.php" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="col-4">
            <button name="login" type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
