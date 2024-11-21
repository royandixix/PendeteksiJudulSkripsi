<?php 
include 'template/sidemenu.php'; 
include 'template/topmenu.php'; 
include 'config/koneksi.php';
$successMessage = false;
if (isset($_GET['delete_id'])) {
  $id_admin = $_GET['delete_id'];
  $query = "DELETE FROM admin WHERE id_admin = '$id_admin'";

  if ($koneksi->query($query) === TRUE) {
    $successMessage = true;
  } else {
    echo "Error: " . $koneksi->error;
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data User | Tabel User</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
<div class="col-sm-6">
  <h1>Tabel User</h1>
</div>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Data User</li>
  </ol>
</div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Users</h3>
      <div class="card-tools">
        <a href="tambah_user.php" class="btn btn-primary btn-sm">
<i class="fas fa-user-plus"></i> Tambah User
        </a>
      </div>
    </div>
    
    <div class="card-body p-0">
      <table class="table table-striped table-bordered text-center mb-0">
        <thead class="thead-dark">
<tr>
  <th style="width: 10px">#</th>
  <th>Username</th>
  <th>Nama</th>
  <th>Level</th>
  <th>Aksi</th>
</tr>
        </thead>
        <tbody>
<?php
$no = 1;
$sql = $koneksi->query("SELECT * FROM admin");
while ($data = $sql->fetch_assoc()) {
?>
<tr>
  <td><?php echo $no++; ?></td>
  <td><?php echo htmlspecialchars($data['username']); ?></td>
  <td><?php echo htmlspecialchars($data['nama']); ?></td>
  <td><?php echo htmlspecialchars($data['level']); ?></td>
  <td>
    <a href="edit_datauser.php?page=edit_datauser&id=<?php echo $data['id_admin']; ?>" class="btn btn-success btn-sm">
      <i class="fas fa-edit"></i> Edit
    </a>
    <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="confirmDelete('<?php echo $data['id_admin']; ?>')">
    <i class="fas fa-trash-alt"></i> Hapus
</a>
<script>
function confirmDelete(id) {
  Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: "Data yang dihapus tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus!',
        confirmButtonColor: '#d33',
        width: '400px' 
    }).then(result => result.isConfirmed && (window.location.href = 'data_user.php?delete_id=' + id));
  }
</script>
    </a>
  </td>
</tr>
<?php
}
?>
<?php if ($successMessage) : ?>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
      title: 'Notifikasi',
      text: 'Data berhasil di Hapus!',
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
        </tbody>
      </table>
    </div>
  </div>
</div>
  </div>
  </div>
    </section>
  </div>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

<?php include 'template/footer.php'; ?>
