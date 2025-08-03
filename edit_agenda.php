<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: ../login.php");
    exit();
}

include 'koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: agenda.php");
    exit();
}

$id = $_GET['id'];
$query = "SELECT * FROM agenda WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data tidak ditemukan.";
    exit();
}

$pesan = "";

// Proses update saat form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $tempat = $_POST['tempat'];
    $kegiatan = $_POST['kegiatan'];
    $keterangan = $_POST['keterangan'];

    $update = "UPDATE agenda SET 
                hari='$hari',
                tanggal='$tanggal',
                waktu='$waktu',
                tempat='$tempat',
                kegiatan='$kegiatan',
                keterangan='$keterangan'
               WHERE id = $id";

    if (mysqli_query($koneksi, $update)) {
        $pesan = "Agenda berhasil diperbarui.";
    } else {
        $pesan = "Gagal memperbarui agenda: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Agenda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 25px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"], input[type="date"], textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        .pesan {
            margin-top: 20px;
            font-weight: bold;
            color: green;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Agenda</h2>

    <?php if ($pesan): ?>
        <p class="pesan"><?= $pesan ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="hari">Hari</label>
        <input type="text" name="hari" id="hari" value="<?= htmlspecialchars($data['hari']) ?>" required>

        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" value="<?= $data['tanggal'] ?>" required>

        <label for="waktu">Waktu</label>
        <input type="text" name="waktu" id="waktu" value="<?= htmlspecialchars($data['waktu']) ?>" required>

        <label for="tempat">Tempat</label>
        <input type="text" name="tempat" id="tempat" value="<?= htmlspecialchars($data['tempat']) ?>" required>

        <label for="kegiatan">Kegiatan</label>
        <textarea name="kegiatan" id="kegiatan" rows="3" required><?= htmlspecialchars($data['kegiatan']) ?></textarea>

        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" id="keterangan" rows="3"><?= htmlspecialchars($data['keterangan']) ?></textarea>

        <button type="submit">Update Agenda</button>
    </form>
    <a href="agenda.php"><button type="button">Kembali ke Agenda</button></a>
</div>

</body>
</html>
