<?php include 'template/sidemenu.php'; ?>
<?php include 'template/topmenu.php'; ?>
<?php include 'config/koneksi.php';
$successMessage = false;
if (isset($_GET['delete_id'])) {

  $id_judul = $_GET['delete_id'];
  $query = "DELETE FROM judul_skripsi WHERE id_judul = '$id_judul'";

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
  <title>Data Judul | Judul skripsi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">




    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Data Judul</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>


      <!-- Main content -->

      <!-- /.card -->

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Tabel Data Judul Mahasiswa</h3>
                  <div class="card-tools">
                    <a href="add_judul.php?page=add_judul" class="btn btn-primary btn-sm">
                      <i class="fas fa-plus"></i> Tambah Judul
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover table-striped text-center">
                    <thead class="thead-dark">
                      <tr>
                        <th>No</th>
                        <th>Judul Skripsi</th>
                        <th>Penulis</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php

                      $no = 1;
                      $sql = $koneksi->query("SELECT * FROM judul_skripsi");
                      while ($data = $sql->fetch_assoc()) {
                      ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo htmlspecialchars($data['Judul']); ?></td>
                          <td><?php echo htmlspecialchars($data['Penulis']); ?></td>
                          <td><?php echo htmlspecialchars($data['Tahun']); ?></td>
                          <td>
                            <a href="edit_datajudul.php?page=edit_datajudul&id=<?php echo $data['id_judul']; ?>" class="btn btn-success">
                              <i class="fas fa-edit"></i></a>
                            <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="confirmDelete('<?php echo $data['id_judul']; ?>')">
                              <i class="fas fa-trash-alt"></i>
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
                                  width: '400px' // Menyesuaikan lebar tampilan
                                }).then(result => result.isConfirmed && (window.location.href = 'judul_skripsi.php?delete_id=' + id));
                              }
                            </script>
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
                                window.location.href = 'judul_skripsi.php';
                              }
                            });
                          });
                        </script>
                      <?php endif; ?>

                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php
    include 'template/footer.php';
    ?>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function() {
        $("#example1").DataTable({
          "responsive": true,
          "autoWidth": false,
        });
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>
</body>

</html>