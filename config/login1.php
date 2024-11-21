<?php

include 'koneksi.php';
include 'logActivity.php';

if (isset($_POST['login'])) {
    $user = mysqli_real_escape_string($koneksi, $_POST['username']);
    $pass = mysqli_real_escape_string($koneksi, $_POST['password']);
   
    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username= '$user' AND password= '$pass'");

    if (!$query) {
        die("Query gagal: " . mysqli_error($koneksi));
    }

    $data = mysqli_fetch_array($query);


    if ($data) {
        $username = $data['username'];
        $level = $data['level'];


        session_start();
        $_SESSION['nama'] = $username;
        $_SESSION['level'] = $level;

        if ($level == 'admin') {
            echo "<script>alert('Anda Berhasil Login. Sebagai : $level');</script>";
            echo "<meta http-equiv='refresh' content='0; url=../home.php'>";
        } else {
            echo "<script>alert('Anda Berhasil Login. Sebagai : $level');</script>";
            echo "<meta http-equiv='refresh' content='0; url=../mahasiswa.php'>";
        }
    } else {
        echo "<script>alert('Username dan Password tidak ditemukan');</script>";
        echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
    } 
}else {
        // Jika data tidak ditemukan, log aktivitas login gagal
        logActivity($koneksi, $user, 'gagal');

        echo "<script>alert('Username dan Password tidak ditemukan');</script>";
        echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
    }
?>

