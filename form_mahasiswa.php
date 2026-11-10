<?php
require_once("../config/auth.php");
?>
<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Tambah Mahasiswa</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<header>
 <h1>Tambah Mahasiswa</h1>
 <p>Web Programming 1</p>
</header>
<nav>
 <a href="index.php">Biodata</a>
 <a href="layout.php">Layout Lab</a>
 <a href="data_mahasiswa.php">Data Mahasiswa</a>
 <a href="form_mahasiswa.php">Tambah Mahasiswa</a>
</nav>
<main>
 <section>
 <h2>Form Data Mahasiswa</h2>
 <form action="../proses/proses_tambah.php" method="POST" class="student-form">
 <label for="nim">NIM</label>
 <input id="nim" name="nim" type="text" required>
 <label for="nama">Nama</label>
 <input id="nama" name="nama" type="text" required>
 <label for="program_studi">Program Studi</label>
 <input id="program_studi" name="program_studi" type="text" required>
 <label for="email">Email</label>
 <input id="email" name="email" type="email" required>
 <button type="submit">Simpan Data</button>
 </form>
 </section>
</main>
<footer>
 <p>Web Programming 1</p>
</footer>
</body>
</html>