<?php include 'template/sidemenu.php'; ?>
<?php include 'template/topmenu.php'; ?>
<?php include 'config/koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tambah Data | Data User</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Styles and Scripts -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Form</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah User</h3>
              </div>

              <!-- Form start -->
              <form role="form" method="POST" action="">
                <div class="card-body">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Input Password" required>
                  </div>
                  <div class="form-group">
                    <label for="level">Level</label>
                    <select class="form-select" id="level" name="level" required>
                        <option selected disabled value="">--PILIH--</option>
                        <option value="admin">Admin</option>
                        <option value="mahasiswa">Mahasiswa</option>
                    </select>
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>

              <?php
             
              if (isset($_POST['submit'])) {
                  $username = $_POST['username'];
                  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                  $nama = $_POST['nama'];
                  $level = $_POST['level'];

                 
                  $sql = "INSERT INTO admin (username, password, nama, level) VALUES ('$username', '$password', '$nama', '$level')";

                  if ($koneksi->query($sql) === TRUE) {
                    echo "<script>
                            Swal.fire({
                              title: 'Sukses!',
                              text: 'Data berhasil ditambahkan!',
                              icon: 'success',
                              confirmButtonText: 'OK'
                            }).then((result) => {
                              if (result.isConfirmed) {
                                window.location.href = 'data_user.php';
                              }
                            });
                          </script>";
                } else {
                    echo "<script>
                            Swal.fire({
                              title: 'Error!',
                              text: 'Data gagal ditambahkan.',
                              icon: 'error',
                              confirmButtonText: 'OK'
                            });
                          </script>";
                  }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<!-- Scripts -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
<?php include 'template/footer.php'; ?>
