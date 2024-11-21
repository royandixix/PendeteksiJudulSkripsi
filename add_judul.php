<?php include 'template/sidemenu.php'; ?>
<?php include 'template/topmenu.php'; ?>
<?php include 'config/koneksi.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | General Form Elements</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Judul Skripsi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Judul</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="">
                <div class="card-body">
                  <div class="form-group">
                    <label for="Judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul">
                  </div>
                  <div class="form-group">
                    <label for="Penulis">Penulis</label>
                    <input type="text" class="form-control" id="penulis" name="penulis" placeholder=" Nama Penulis">
                  </div>
                  <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Tahun" required>
                  </div>
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <?php
              
        $successMessage = false;
        if (isset($_POST['submit'])) {
            $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
            $penulis = mysqli_real_escape_string($koneksi, $_POST['penulis']);
            $tahun = mysqli_real_escape_string($koneksi, $_POST['tahun']);
        
            $sql = "INSERT INTO judul_skripsi (Judul, Penulis, Tahun) VALUES ('$judul', '$penulis', '$tahun')";
        
            if ($koneksi->query($sql) === TRUE) {
              $successMessage = true;
            } else {
                echo "Error: " . $sql . "<br>" . $koneksi->error;
            }
        }
        ?>
         <?php if ($successMessage) : ?>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
      title: 'Notifikasi',
      text: 'Data berhasil ditambahkan!',
      icon: 'success',
      confirmButtonText: 'OK'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'judul_skripsi.php';
      }
    });
  });
</script>
<?php endif; ?>
        
            </div>
            <!-- /.card -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 
  
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
<?php include 'template/footer.php'; ?>