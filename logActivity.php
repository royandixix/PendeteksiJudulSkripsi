<?php
function logActivity($koneksi, $username, $status) {
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $time = date("Y-m-d H:i:s");

    // Tambahkan geolokasi menggunakan API
    $location = @file_get_contents("http://ip-api.com/json/$ip_address");
    $location_data = json_decode($location, true);
    $city = $location_data['city'] ?? 'Tidak diketahui';
    $country = $location_data['country'] ?? 'Tidak diketahui';

    $query = "INSERT INTO log_aktivitas (username, aktivitas, waktu, ip_address, user_agent, lokasi) 
              VALUES ('$username', '$aktivitas', '$time', '$ip_address', '$user_agent', '$city, $country')";
    mysqli_query($koneksi, $query);
}
?>
 