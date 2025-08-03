<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: ../login.php");
    exit();
}

include '../koneksi.php'; // sesuai dengan galeri.php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Ambil data foto berdasarkan ID
    $query = "SELECT foto FROM galeri WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $namaFile = $data['foto'];

        // Hapus data dari database
        $hapus_query = "DELETE FROM galeri WHERE id = $id";
        if (mysqli_query($conn, $hapus_query)) {
            // Hapus file dari folder upload
            $path = "../upload/$namaFile";
            if (!empty($namaFile) && file_exists($path)) {
                unlink($path);
            }

            header("Location: galeri.php?pesan=hapus_sukses");
            exit();
        } else {
            echo "❌ Gagal menghapus data dari database: " . mysqli_error($conn);
        }
    } else {
        echo "⚠️ Data tidak ditemukan.";
    }
} else {
    echo "⚠️ ID tidak ditemukan.";
}
?>
