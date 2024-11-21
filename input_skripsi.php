<?php 
include 'template/mahasiswa_dashboard.php'; 
include 'template/topmenu.php'; 
include 'config/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Data Judul | Judul Skripsi</title>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Judul Skripsi</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Input Judul Skripsi</h3>
            </div>
            <div class="card-body">
              <form method="POST" action="">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="nim" placeholder="Masukkan NIM" required>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Skripsi Anda" required>
                </div>
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit">Tambah</button>
                </div>
              </form>

              <?php
              $successMessage = false;
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                  $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
                  $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
                  $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
              
                  $query = "INSERT INTO judul_mahasiswa (nim, nama, judul) VALUES ('$nim', '$nama', '$judul')";
                  if (mysqli_query($koneksi, $query)) {
                      $successMessage = true;
                  } else {
                      echo "Error: " . $query . "<br>" . $koneksi->error;
                  }
              }
              ?>
               <?php if ($successMessage) : ?>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
            title: 'Notifikasi',
            text: 'Judul Berhasil Diajukan!',
            icon: 'success',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = 'input_skripsi.php';
            }
          });
        });
      </script>
      <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
</body>
</html>

<?php include 'template/footer.php'; ?>
