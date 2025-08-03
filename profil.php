<?php
include 'dashboard/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil - Prokompim</title>
  <link rel="stylesheet" href="style.css?v=3">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body:not(.home) {
      background: none !important;
      background-image: none !important;
    }
    .profil-container {
      max-width: 1000px;
      margin: auto;
      padding: 60px 20px;
      background-color: #fdfdfd;
    }
    .profil-section {
      margin-bottom: 40px;
      opacity: 0;
      transform: translateY(30px);
      transition: opacity 0.8s ease, transform 0.8s ease;
    }
    .profil-section.active {
      opacity: 1;
      transform: translateY(0);
    }
    .profil-section img {
    max-width: 100%;
    height: auto;
    margin-top: 60px; /* ditambahkan */
    margin-bottom: 20px;
    border-radius: 10px;
    max-height: 300px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    }
    .profil-section h2 {
      font-size: 24px;
      margin-bottom: 10px;
      color: #2c3e50;
      text-align: center;
    }
    .profil-section p, .profil-section ul {
      font-size: 16px;
      color: #444;
      text-align: justify;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    table th, table td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: center;
    }
    table th {
      background-color: #003366;
      color: white;
    }
  </style>
</head>
<body>

<!-- Navigasi -->
<header>
  <div class="logo">PROKOMPIM</div>
  <button class="menu-toggle" id="menu-toggle" aria-label="Toggle Menu">
    <i class="fas fa-bars"></i>
  </button>
  <nav id="nav-menu">
    <ul>
      <li><a href="index.php">BERANDA</a></li>
      <li><a href="tentang_kami.php" class="active">TENTANG KAMI</a></li>
      <li><a href="galeri.php">DOKUMENTASI</a></li>
      <li><a href="agenda.php">AGENDA</a></li>
      <li><a href="kontak.php">PENGADUAN</a></li>
      <li><a href="login.php" class="btn-masuk">Login</a></li>
    </ul>
  </nav>
</header>

<div class="profil-container">
  <div class="profil-section">
    <img src="public/assets/foto beranda.jpg" alt="Sejarah">
    <h2>Sejarah Singkat</h2>
    <p>Bagian Protokol dan Komunikasi Pimpinan (PROKOMPIM) Kota Tidore Kepulauan dibentuk sebagai bagian dari upaya pemerintah untuk menyelaraskan kegiatan keprotokolan serta komunikasi publik dan dokumentasi pimpinan daerah secara profesional, modern, dan informatif. PROKOMPIM berperan sebagai penghubung strategis antara pemerintah dan masyarakat melalui peliputan, dokumentasi, dan penyebaran informasi resmi kegiatan pimpinan daerah.</p>
  </div>

  <!-- Bagian Baru: Apa Itu PROKOMPIM -->
  <div class="profil-section">
    <img src="public/assets/lovely-young-woman-white-t-shirt-thinking-while-holding-mobile-phone-white-wall.jpg" alt="Apa itu Prokompim">
    <h2>Apa Itu PROKOMPIM?</h2>
    <p>PROKOMPIM (Protokol dan Komunikasi Pimpinan) adalah sebuah bagian di Sekretariat Daerah Kota Tidore Kepulauan yang memiliki peran penting dalam menyelenggarakan pelayanan keprotokolan serta mengelola dokumentasi dan publikasi kegiatan pimpinan daerah. PROKOMPIM menjadi garda terdepan dalam menyampaikan informasi resmi kepada masyarakat melalui media massa dan platform digital, serta memastikan setiap kegiatan pimpinan berjalan sesuai tata protokol yang berlaku.</p>
  </div>

  <!-- Struktur Organisasi -->
  <div class="profil-section">
    <img src="public/assets/STRUKTUR ORGANISASI PROKOMPIM.jpg" alt="Struktur Organisasi">
    <h2>Struktur Organisasi</h2>
    <p>Struktur organisasi PROKOMPIM terdiri dari Kepala Bagian, Subbagian Protokol, Subbagian Dokumentasi dan Publikasi, serta staf pendukung lainnya yang saling bekerja sama untuk mencapai visi dan tujuan bersama.</p>
  </div>

  <!-- Daftar Kehadiran -->
  <div class="profil-section">
    <h2>Daftar Kehadiran Pimpinan</h2>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Drs. Ahmad Rasyid</td>
          <td>Hadir</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Siti Rahma, S.Sos</td>
          <td>Tidak Hadir</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Johan Salim, M.I.Kom</td>
          <td>Hadir</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Footer -->
<footer class="footer">
  <div class="footer-container">
    <div class="footer-section">
      <h3>PROKOMPIM</h3>
      <p>Website ini dibuat untuk mendokumentasikan kegiatan bagian Protokol dan Komunikasi Pimpinan Kota Tidore Kepulauan secara digital dan informatif.</p>
    </div>
    <div class="footer-section">
      <h3>PRODUK</h3>
      <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="tentang_kami.php">Tentang Kami</a></li>
        <li><a href="galeri.php">Dokumentasi</a></li>
        <li><a href="agenda.php">Agenda</a></li>
        <li><a href="kontak.php">Pengaduan</a></li>
      </ul>
    </div>
<div class="footer-section">
  <h3>KONTAK</h3>
  <ul class="footer-contact">
    <li>
      <i class="fas fa-map-marker-alt"></i>
      <span>Alamat:</span>
      <a href="https://www.google.com/maps?q=MCCW+JMG,+Tomagoba,+Tidore,+Kota+Tidore+Kepulauan,+Maluku+Utara" target="_blank">
        Kantor Walikota Tidore, Maluku Utara
      </a>
    </li>
    <li>
      <i class="fas fa-envelope"></i>
      <span>Email:</span>
      <a href="mailto:prokompim@tidore.go.id">prokompim@tidore.go.id</a>
    </li>
    <li>
      <i class="fab fa-whatsapp"></i>
      <span>WhatsApp:</span>
      <a href="https://wa.me/6281234567890" target="_blank">+62 812 3456 7890</a>
    </li>
    <li>
      <i class="fab fa-facebook"></i>
      <span>Facebook:</span>
      <a href="https://facebook.com/tidore.kepulauan" target="_blank">facebook.com/tidore.kepulauan</a>
    </li>
    <li>
      <i class="fab fa-twitter"></i>
      <span>Twitter:</span>
      <a href="https://twitter.com/tidoreofficial" target="_blank">@tidoreofficial</a>
    </li>
  </ul>
</div>
  </div>
  <div class="footer-bottom">
    <p>© 2025 Website PROKOMPIM Kota Tidore Kepulauan</p>
  </div>
</footer>

<!-- Animasi Scroll -->
<script>
  const sections = document.querySelectorAll('.profil-section');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('active');
      }
    });
  }, { threshold: 0.2 });

  sections.forEach(section => {
    observer.observe(section);
  });

  const toggleBtn = document.getElementById('menu-toggle');
  const navMenu = document.getElementById('nav-menu');
  toggleBtn.addEventListener('click', () => {
    navMenu.classList.toggle('active');
  });
</script>

</body>
</html>
