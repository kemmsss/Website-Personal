<?php
include '../koneksi.php';
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

$success = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];

    // Upload foto
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $folder = "../upload/";

    $ekstensi_valid = ['jpg', 'jpeg', 'png', 'webp'];
    $ekstensi = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

    if (!in_array($ekstensi, $ekstensi_valid)) {
        $error = "Format foto tidak didukung!";
    } else {
        $nama_foto = time() . '-' . $foto;
        if (move_uploaded_file($tmp, $folder . $nama_foto)) {
            $query = "INSERT INTO galeri (judul, deskripsi, tanggal, foto) VALUES ('$judul', '$deskripsi', '$tanggal', '$nama_foto')";
            if (mysqli_query($conn, $query)) {
                $success = "Galeri berhasil ditambahkan!";
            } else {
                $error = "Gagal menambahkan galeri: " . mysqli_error($conn);
            }
        } else {
            $error = "Gagal mengunggah file foto!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Galeri - Prokompim</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }
        body {
            background: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            background: white;
            margin: 60px auto;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #006d77;
            margin-bottom: 20px;
        }
        label {
            font-weight: 600;
            display: block;
            margin-top: 15px;
        }
        input, textarea {
            width: 100%;
            padding: 10px 12px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            background-color: #06d6a0;
            color: white;
            padding: 10px 20px;
            border: none;
            margin-top: 20px;
            width: 100%;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background-color: #05b187;
        }
        .alert {
            padding: 10px;
            margin-top: 15px;
            border-radius: 6px;
        }
        .success {
            background: #d4edda;
            color: #155724;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
        }
        a.back {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #006d77;
            text-decoration: none;
        }
        a.back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Galeri Kegiatan</h2>

        <?php if ($success): ?>
            <div class="alert success"><?= $success ?></div>
        <?php elseif ($error): ?>
            <div class="alert error"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" required>

            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" required></textarea>

            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" required>

            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" accept="image/*" required>

            <button type="submit">Simpan Galeri</button>
        </form>

        <a href="galeri.php" class="back">← Kembali ke Galeri</a>
    </div>
</body>
</html>
