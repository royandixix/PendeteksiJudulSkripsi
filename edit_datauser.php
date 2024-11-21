<?php 
include 'template/sidemenu.php';
include 'template/topmenu.php';
include 'config/koneksi.php'; 
$successMessage = false;

if (isset($_GET['id'])) {
    $id_admin = $_GET['id'];


    $query = "SELECT * FROM admin WHERE id_admin = '$id_admin'";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_admin = $_POST['id_admin'];
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $level = $_POST['level'];

  
    $query = "UPDATE admin SET username = '$username', nama = '$nama', level = '$level' WHERE id_admin = '$id_admin'";
    
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
  <title>Edit Data User | Manajemen User</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit User</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit User</h3>
              </div>
              <!-- /.card-header -->
              <form role="form" method="POST" action="">
                <div class="card-body">
                  <input type="hidden" name="id_admin" value="<?php echo $data['id_admin']; ?>">

                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $data['username']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="level">Level</label>
                    <select class="form-control" id="level" name="level" required>
                      <option value="admin" <?php if ($data['level'] == 'admin') echo 'selected'; ?>>Admin</option>
                      <option value="mahasiswa" <?php if ($data['level'] == 'mahasiswa') echo 'selected'; ?>>Mahasiswa</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Edit</button>
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
        window.location.href = 'data_user.php';
      }
    });
  });
</script>
<?php endif; ?>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

<?php include 'template/footer.php'; ?> 
