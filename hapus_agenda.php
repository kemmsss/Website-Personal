<?php
include '../koneksi.php';

$id = $_GET['id'];

$hapus = mysqli_query($conn, "DELETE FROM agenda WHERE id='$id'");

if ($hapus) {
    header("Location: agenda.php?pesan=hapus");
} else {
    echo "Gagal menghapus data: " . mysqli_error($conn);
}
?>
