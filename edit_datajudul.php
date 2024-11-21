<?php 
include 'template/sidemenu.php';
include 'template/topmenu.php';
include 'config/koneksi.php'; 
$successMessage = false;
if (isset($_GET['id'])) {
    $id_judul = $_GET['id'];
    $query = "SELECT * FROM judul_skripsi WHERE id_judul = '$id_judul'";
    $result = $koneksi->query($query);
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_judul = $_POST['id_judul'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun'];
    $query = "UPDATE judul_skripsi SET Judul = '$judul', Penulis = '$penulis', Tahun = '$tahun' WHERE id_judul = '$id_judul'";
    if ($koneksi->query($query) === TRUE) {
        $successMessage = true;
    } else {
        echo "Error: " . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Data Judul | Deteksi Judul Skripsi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    .content-wrapper {
      margin: 20px;
    }
    .card {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .form-group label {
      font-weight: bold;
    }
    .btn-primary {
      width: 100%;
    }
  </style>
</head>
<body>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Judul Skripsi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Judul</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Judul</h3>
              </div>
              <form role="form" method="POST" action="">
                <div class="card-body">
                  <input type="hidden" name="id_judul" value="<?php echo $data['id_judul']; ?>">

                  <div class="form-group">
                    <label for="judul">Judul Skripsi</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $data['Judul']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="penulis">Penulis</label>
                    <input type="text" class="form-control" id="penulis" name="penulis" value="<?php echo $data['Penulis']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input type="number" class="form-control" id="tahun" name="tahun" value="<?php echo $data['Tahun']; ?>" required>
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

<?php if ($successMessage) : ?>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
      title: 'Notifikasi',
      text: 'Data berhasil diedit!',
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


<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>



</body>
</html>

<?php include 'template/footer.php'; ?>
