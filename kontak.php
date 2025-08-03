<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

include '../koneksi.php';
$query = "SELECT * FROM kontak ORDER BY tanggal DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kontak Masuk - Prokompim</title>
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

        .main {
            flex: 1;
            margin-left: 240px;
            padding: 30px 40px;
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

        .content {
            margin-top: 80px;
        }

        h2 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #0a4275;
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
        }

        /* Animasi sederhana */
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
    <a href="index.php" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a href="agenda.php"><i class="fas fa-calendar-alt"></i> Agenda</a>
    <a href="galeri.php"><i class="fas fa-image"></i> Galeri</a>
    <a href="kontak.php"><i class="fas fa-envelope"></i> Pengaduan</a>
</div>


<div class="topbar">
    <h1>Pengaduan - Selamat Datang, <?= htmlspecialchars($_SESSION['admin']) ?></h1>
    <a href="../logout.php" class="logout-btn">Logout</a>
</div>

<div class="main fade-in">
    <div class="content">
        <h2>Pesan Kontak Masuk</h2>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Subjek</th>
                    <th>Pesan</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>{$no}</td>
                            <td>" . htmlspecialchars($row['nama']) . "</td>
                            <td>" . htmlspecialchars($row['email']) . "</td>
                            <td>" . htmlspecialchars($row['subjek']) . "</td>
                            <td>" . htmlspecialchars($row['pesan']) . "</td>
                            <td>" . htmlspecialchars($row['tanggal']) . "</td>
                        </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='6'>Belum ada pesan masuk.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
