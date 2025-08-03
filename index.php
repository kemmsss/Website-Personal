<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prokompim</title>
    <link rel="stylesheet" href="style.css?v=2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<!-- Tambahkan class 'beranda' agar hanya halaman ini yang pakai background -->
<body class="home">
<header>
    <div class="logo">PROKOMPIM</div>
    <button class="menu-toggle" id="menu-toggle" aria-label="Toggle Menu">
        <i class="fas fa-bars"></i>
    </button>
    <nav id="nav-menu">
        <ul>
            <li><a href="index.php">BERANDA</a></li>
            <li><a href="tentang_kami.php">TENTANG KAMI</a></li>
            <li><a href="galeri.php">DOKUMENTASI</a></li>
            <li><a href="agenda.php">AGENDA</a></li>
            <li><a href="kontak.php">PENGADUAN</a></li>
            <li><a href="login.php" class="btn-masuk">Login</a></li>
        </ul>
    </nav>
</header>

<!-- Hero Section dengan background slideshow -->
<section class="hero slideshow-bg">
    <div class="hero-content">
        <h1>Selamat Datang di Website Resmi</h1>
        <p>
            Melalui platform ini, kami hadir untuk menyajikan informasi terkini seputar 
            dokumentasi kegiatan, agenda pimpinan, serta berbagai laporan dan publikasi resmi dari 
            Bagian Protokol dan Komunikasi Pimpinan Setda Kota Tidore Kepulauan.
        </p>
        <a href="galeri.php" class="btn-cta">Lihat Sekarang!</a>
    </div>
</section>

<script>
    const toggleBtn = document.getElementById('menu-toggle');
    const navMenu = document.getElementById('nav-menu');

    toggleBtn.addEventListener('click', () => {
        navMenu.classList.toggle('active');
    });
</script>
</body>
</html>
