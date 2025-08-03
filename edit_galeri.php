<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

include '../koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: galeri.php");
    exit;
}

$id = intval($_GET['id']);
$query = mysqli_query($conn, "SELECT * FROM galeri WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}

$pesan = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = htmlspecialchars($_POST['judul']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $tanggal = $_POST['tanggal'];
    
    // Cek apakah ada file baru
    if (!empty($_FILES['foto']['name'])) {
        $target_dir = "../upload/";
        $file_name = basename($_FILES["foto"]["name"]);
        $target_file = $target_dir . $file_name;
        $uploadOk = true;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validasi tipe file
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowed)) {
            $pesan = "Format file tidak diperbolehkan.";
            $uploadOk = false;
        }

        if ($uploadOk) {
            // Hapus file lama
            if (!empty($data['foto']) && file_exists("../upload/" . $data['foto'])) {
                unlink("../upload/" . $data['foto']);
            }

            // Upload file baru
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                $foto = $file_name;
                $update = "UPDATE galeri SET judul='$judul', deskripsi='$deskripsi', tanggal='$tanggal', foto='$foto' WHERE id=$id";
            } else {
                $pesan = "Gagal mengupload foto.";
                $uploadOk = false;
            }
        }
    } else {
        // Jika tidak mengganti foto
        $update = "UPDATE galeri SET judul='$judul', deskripsi='$deskripsi', tanggal='$tanggal' WHERE id=$id";
    }

    if (isset($update) && mysqli_query($conn, $update)) {
        header("Location: galeri.php?pesan=edit_berhasil");
        exit;
    } elseif (empty($pesan)) {
        $pesan = "Gagal mengupdate data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Galeri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f4f7fc;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 8px rgba(0,0,0,0.05);
        }

        h2 {
            text-align: center;
            color: #0a4275;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
            color: #333;
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-top: 6px;
        }

        input[type="file"] {
            margin-top: 10px;
        }

        .preview-img {
            margin-top: 10px;
            max-width: 100%;
            height: auto;
            border-radius: 6px;
        }

        button {
            margin-top: 25px;
            padding: 10px 20px;
            background-color: #1e90ff;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }

        button:hover {
            background-color: #0f68c3;
        }

        .pesan {
            margin-top: 15px;
            font-weight: bold;
            color: red;
            text-align: center;
        }

        a.kembali {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #0a4275;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Galeri</h2>

    <?php if ($pesan): ?>
        <div class="pesan"><?= $pesan ?></div>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="judul">Judul</label>
        <input type="text" name="judul" id="judul" value="<?= htmlspecialchars($data['judul']); ?>" required>

        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" rows="4" required><?= htmlspecialchars($data['deskripsi']); ?></textarea>

        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" value="<?= $data['tanggal']; ?>" required>

        <label for="foto">Ganti Foto (Opsional)</label>
        <input type="file" name="foto" id="foto" accept="image/*">
        <img src="../upload/<?= htmlspecialchars($data['foto']); ?>" class="preview-img" alt="Preview Foto Lama">

        <button type="submit">Simpan Perubahan</button>
    </form>
    <a href="galeri.php" class="kembali">← Kembali ke Galeri</a>
</div>

</body>
</html>
