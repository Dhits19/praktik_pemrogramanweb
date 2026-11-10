<?php
require_once("../config/auth.php");
?>
<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Dashboard - Web Programming 1</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<header>
 <h1>Dashboard Project Web Programming 1</h1>
 <p>Halo, <strong><?= htmlspecialchars($_SESSION["nama_lengkap"]) ?></strong></p>
</header>
<nav>
 <a href="dashboard.php">Dashboard</a>
 <a href="index.php">Home / Biodata</a>
 <a href="layout.php">Layout Lab</a>
 <a href="data_mahasiswa.php">Data Mahasiswa</a>
 <a href="form_mahasiswa.php">Tambah Mahasiswa</a>
 <a href="../crud/index.php">CRUD Mahasiswa</a>
 <a href="../crud-media/index.php">CRUD Media</a>
 <a href="../proses/logout.php">Logout</a>
</nav>
<main>
 <section>
 <h2>Project Hub</h2>
 <p>Pilih bagian project yang ingin dibuka:</p>
 <ul>
 <li><a href="index.php">Home / Biodata - hasil Modul 1-2</a></li>
 <li><a href="layout.php">Layout Lab - hasil Modul 3A</a></li>
 <li><a href="data_mahasiswa.php">Data Mahasiswa - hasil Modul 3B</a></li>
 <li><a href="form_mahasiswa.php">Tambah Mahasiswa - hasil Modul 4B</a></li>
 </ul>
 </section>
</main>
</body>
</html>