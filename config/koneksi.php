<?php

    // konfigurasi database

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "db_221177";

    $koneksi=mysqli_connect($host, $username, $password, $database);

    if (!$koneksi) {
        echo "Database error: " . mysqli_connect_error(); 
        exit(); 
    }
    ?>
    