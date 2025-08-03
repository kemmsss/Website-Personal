<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $tempat = $_POST['tempat'];
    $kegiatan = $_POST['kegiatan'];
    $keterangan = $_POST['keterangan'];

    $query = "INSERT INTO agenda (hari, tanggal, waktu, tempat, kegiatan, keterangan)
              VALUES ('$hari', '$tanggal', '$waktu', '$tempat', '$kegiatan', '$keterangan')";

    if (mysqli_query($conn, $query)) {
        header("Location: agenda.php?pesan=sukses");
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Agenda</title>
</head>
<body>
    <h2>Tambah Agenda</h2>
    <form method="POST" action="">
        Hari: <input type="text" name="hari" required><br>
        Tanggal: <input type="date" name="tanggal" required><br>
        Waktu: <input type="text" name="waktu" required><br>
        Tempat: <input type="text" name="tempat" required><br>
        Kegiatan: <textarea name="kegiatan" required></textarea><br>
        Keterangan: <textarea name="keterangan"></textarea><br>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>
