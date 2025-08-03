<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

include '../koneksi.php';
$jumlah_agenda = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM agenda"));
$jumlah_galeri = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM galeri"));
$jumlah_kontak = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontak"));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
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
            flex-direction: column;
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
            padding: 100px 40px 40px;
        }

        .main h2 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #0a4275;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            background: #ffffff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.07);
            text-align: center;
            width: 250px;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card i {
            font-size: 36px;
            margin-bottom: 15px;
            color: #1e90ff;
        }

        .card h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #0a4275;
        }

        .card p {
            font-size: 20px;
            font-weight: bold;
            color: #1e90ff;
        }

        @media screen and (max-width: 768px) {
            body {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding: 10px 0;
            }

            .sidebar a {
                padding: 12px 20px;
                text-align: center;
            }

            .topbar {
                position: relative;
                left: 0;
                width: 100%;
                margin-top: 10px;
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
                padding: 10px 20px;
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }

            .card-container {
                flex-direction: column;
                align-items: center;
            }

            .card {
                width: 100%;
                max-width: 320px;
            }
        }
        /* Membuat table bisa scroll horizontal di layar kecil */
.responsive-table {
    width: 100%;
    overflow-x: auto;
}

/* Supaya isi tabel tidak melebihi lebar layar */
.responsive-table table {
    width: 100%;
    border-collapse: collapse;
}

/* Responsive behavior untuk tombol dan teks */
@media (max-width: 768px) {
    .container {
        padding: 1rem;
    }

    .btn {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
    }

    table th, table td {
        font-size: 0.85rem;
        padding: 8px;
    }

    h2 {
        font-size: 1.2rem;
    }

    .sidebar {
        font-size: 0.9rem;
    }
}

    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <a href="index.php" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a href="agenda.php"><i class="fas fa-calendar-alt"></i> Agenda</a>
    <a href="galeri.php"><i class="fas fa-image"></i> Galeri</a>
    <a href="kontak.php"><i class="fas fa-envelope"></i> Pengaduan</a>
</div>

<!-- Topbar -->
<div class="topbar">
    <h1>Dashboard Admin - Selamat Datang, <?= htmlspecialchars($_SESSION['admin']) ?></h1>
    <a href="../logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

<!-- Main -->
<div class="main">
    <h2>Selamat Datang, Admin!</h2>
    <div class="card-container">
        <div class="card">
            <i class="fas fa-calendar-alt"></i>
            <h3>Total Agenda</h3>
            <p><?= $jumlah_agenda ?></p>
        </div>
        <div class="card">
            <i class="fas fa-image"></i>
            <h3>Total Galeri</h3>
            <p><?= $jumlah_galeri ?></p>
        </div>
        <div class="card">
            <i class="fas fa-envelope"></i>
            <h3>Total Pesan Kontak</h3>
            <p><?= $jumlah_kontak ?></p>
        </div>
    </div>
</div>

</body>
</html>
