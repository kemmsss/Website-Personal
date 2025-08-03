<?php
// koneksi.php
$koneksi = mysqli_connect("localhost", "root", "", "prokompim");

// Cek koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
