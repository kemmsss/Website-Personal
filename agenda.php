<?php 
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

include '../koneksi.php';
$query = "SELECT * FROM agenda ORDER BY tanggal ASC, waktu ASC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Agenda Pimpinan</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            background: #f4f7fc;
            color: #333;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 240px;
            background: #0a4275;
            color: white;
            padding-top: 40px;
            position: fixed;
            height: 100%;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }

        .sidebar a {
            display: block;
            padding: 16px 24px;
            color: white;
            text-decoration: none;
            transition: background 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #1e90ff;
        }

        .topbar {
            background: #ffffff;
            padding: 16px 24px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.08);
            position: fixed;
            top: 0;
            left: 240px;
            right: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar h1 {
            font-size: 20px;
            color: #0a4275;
        }

        .logout-btn {
            padding: 8px 14px;
            background: #ef233c;
            color: white;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .logout-btn:hover {
            background: #d90429;
        }

        .main {
            flex: 1;
            margin-left: 240px;
            padding: 30px 40px;
            margin-top: 80px;
        }

        .main h2 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #0a4275;
        }

        .add-button {
            background: #1e90ff;
            color: white;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            display: inline-block;
            margin-bottom: 20px;
        }

        .add-button:hover {
            background: #0f68c3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 8px rgba(0,0,0,0.05);
            border-radius: 10px;
            overflow: hidden;
        }

        table th, table td {
            padding: 14px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        table th {
            background: #0a4275;
            color: white;
        }

        table tr:hover {
            background-color: #f1faff;
        }

        .btn {
            padding: 6px 10px;
            font-size: 14px;
            border-radius: 6px;
            color: white;
            text-decoration: none;
            margin-right: 6px;
        }

        .btn-edit {
            background: #10b981;
        }

        .btn-edit:hover {
            background: #059669;
        }

        .btn-delete {
            background: #ef4444;
        }

        .btn-delete:hover {
            background: #dc2626;
        }

        @media screen and (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .main {
                margin-left: 0;
            }
            .topbar {
                left: 0;
            }

            table thead {
                display: none;
            }

            table, table tbody, table tr, table td {
                display: block;
                width: 100%;
            }

            table tr {
                margin-bottom: 15px;
                background: white;
                border-radius: 10px;
                box-shadow: 0 0 4px rgba(0,0,0,0.05);
                padding: 10px;
            }

            table td {
                text-align: right;
                position: relative;
                padding-left: 50%;
            }

            table td::before {
                content: attr(data-label);
                position: absolute;
                left: 14px;
                top: 14px;
                font-weight: bold;
                color: #555;
                text-align: left;
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="sidebar">
    <a href="index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a href="agenda.php" class="active"><i class="fas fa-calendar-alt"></i> Agenda</a>
    <a href="galeri.php"><i class="fas fa-image"></i> Galeri</a>
    <a href="kontak.php"><i class="fas fa-envelope"></i> Pengaduan</a>
</div>

<div class="topbar">
    <h1>Agenda Pimpinan - Selamat Datang, <?= htmlspecialchars($_SESSION['admin']) ?></h1>
    <a href="../logout.php" class="logout-btn">Logout</a>
</div>

<div class="main fade-in">
    <h2>Data Agenda Pimpinan</h2>
    <a href="agenda_tambah.php" class="add-button">+ Tambah Agenda</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Hari</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Tempat</th>
                <th>Kegiatan</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td data-label='No'>{$no}</td>
                    <td data-label='Hari'>" . htmlspecialchars($row['hari']) . "</td>
                    <td data-label='Tanggal'>" . htmlspecialchars($row['tanggal']) . "</td>
                    <td data-label='Waktu'>" . htmlspecialchars($row['waktu']) . "</td>
                    <td data-label='Tempat'>" . htmlspecialchars($row['tempat']) . "</td>
                    <td data-label='Kegiatan'>" . htmlspecialchars($row['kegiatan']) . "</td>
                    <td data-label='Keterangan'>" . htmlspecialchars($row['keterangan']) . "</td>
                    <td data-label='Aksi'>
                        <a href='edit_agenda.php?id={$row['id']}' class='btn btn-edit'><i class='fas fa-pen'></i></a>
                        <a href='hapus_agenda.php?id={$row['id']}' class='btn btn-delete' onclick='return confirm(\"Yakin ingin menghapus agenda ini?\")'><i class='fas fa-trash'></i></a>
                    </td>
                </tr>";
                $no++;
            }

            if (mysqli_num_rows($result) === 0) {
                echo "<tr><td colspan='8' style='text-align:center;'>Belum ada data agenda.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
