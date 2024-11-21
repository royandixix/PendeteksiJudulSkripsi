<?php include 'template/mahasiswa_dashboard.php'; ?>
<?php include 'template/topmenu.php'; ?>
<?php include 'config/koneksi.php';?>
<?php include 'includes/winnowing.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Judul | Judul skripsi</title>
  <!-- Font Awesome, Ionicons, DataTables, and AdminLTE styles -->
  <!-- Your stylesheets here -->
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Judul Skripsi</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Data Judul Mahasiswa</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul Skripsi</th>
                    <th>Penulis</th>
                    <th>Tahun</th>
                  </tr>
                </thead>
                <tbody>
                  <form method="POST" action="">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="judul_cari" placeholder="Masukkan judul skripsi untuk dicek kemiripannya">
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                      </div>
                    </div>
                  </form>

                  <?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT * FROM judul_skripsi");
                  while ($data = $sql->fetch_assoc()) {
                    ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $data['Judul'];?></td>
                    <td><?php echo $data['Penulis'];?></td>
                    <td><?php echo $data['Tahun'];?></td>
                  </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

           <!-- Jika mahasiswa mengisi form pencarian, tampilkan hasil kemiripan -->
           <?php
          if (isset($_POST['judul_cari'])) {
              $judul_baru = $_POST['judul_cari'];
              $sql = $koneksi->query("SELECT * FROM judul_skripsi");
              
              echo '<div class="card">';
              echo '<div class="card-header"><h3 class="card-title">Judul yang Dimasukkan</h3></div>';
              echo '<div class="card-body">';
              echo '<table class="table table-bordered table-striped">';
              echo '<thead><tr><th>Judul Skripsi</th></tr></thead>';
              echo '<tbody><tr><td>' . $judul_baru . '</td></tr></tbody>';
              echo '</table>';
              echo '</div></div>';
              
              // Array untuk menyimpan hasil kemiripan
              $hasil_kemiripan = array();
              
              while ($data = $sql->fetch_assoc()) {
                  $judul_lama = $data['Judul'];

                  // Hitung kemiripan menggunakan algoritma Winnowing
                  $persentase_kemiripan = winnowing($judul_baru, $judul_lama, 5, 3); // K=5, windowSize=3
                  
                  // Jika kemiripan lebih dari 0, simpan hasilnya ke dalam array
                  if ($persentase_kemiripan > 0) {
                      $hasil_kemiripan[] = array(
                          'judul' => $data['Judul'],
                          'kemiripan' => $persentase_kemiripan
                      );
                  }
              }

              // Mengurutkan array berdasarkan kemiripan (dari yang tertinggi ke terendah)
              usort($hasil_kemiripan, function($a, $b) {
                  return $b['kemiripan'] - $a['kemiripan'];
              });

             // Jika ada hasil kemiripan, ambil hasil pertama (tertinggi)
        if (!empty($hasil_kemiripan)) {
      $judul_tertinggi = $hasil_kemiripan[0]['judul'];
      $persentase_tertinggi = $hasil_kemiripan[0]['kemiripan'];

      $persentase_tertinggi = number_format($persentase_tertinggi, 2) . '%';

     // Simpan data ke tabel hasil_kemiripan
     $query_insert = $koneksi->prepare("INSERT INTO hasilkemiripan (Judul_1, Judul_2, Persentase) VALUES (?, ?, ?)");

    if ($query_insert) {
      // Bind parameter dengan tipe string untuk semua nilai (judul_tertinggi, judul_baru, persentase_tertinggi)
      $query_insert->bind_param("sss", $judul_tertinggi, $judul_baru, $persentase_tertinggi);
      $query_insert->execute();
    } else {
      // Jika prepare gagal, tampilkan pesan error
      echo "Error pada prepare statement: " . $koneksi->error;
   }
    }

              echo '<div class="card">';
              echo '<div class="card-header"><h3 class="card-title">Hasil Kemiripan</h3></div>';
              echo '<div class="card-body">';
              echo '<table class="table table-bordered table-striped">';
              echo '<thead><tr><th>No</th><th>Judul Skripsi</th><th>Persentase Kemiripan</th></tr></thead><tbody>';
              
              $no = 1;
              foreach ($hasil_kemiripan as $result) {
                  echo "<tr><td>$no</td><td>" . $result['judul'] . "</td><td>" . $result['kemiripan'] . "%</td></tr>";
                  $no++;
              }
              echo '</tbody></table>';
              echo '</div></div>';
          }
          ?>

        </div>
      </div>
    </section>
  </div>

</div>

<!-- jQuery, Bootstrap, and other scripts -->
</body>
</html>

<?php
  include 'template/footer.php';
?>
