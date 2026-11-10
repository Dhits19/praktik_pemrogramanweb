<?php
require_once("../config/auth.php");
?>
<?php
require_once "../config/koneksi.php";
$sql = "SELECT id, nim, nama, program_studi, email
 FROM mahasiswa
 ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Data Mahasiswa</title>
 <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<header>
 <h1>Data Mahasiswa</h1>
</header>
<nav>
 <a href="index.php">Biodata</a>
 <a href="layout.php">Layout Lab</a>
 <a href="data_mahasiswa.php">Data Mahasiswa</a>
 <a href="form_mahasiswa.php">Tambah Mahasiswa</a>
</nav>
<main>
 <section>
 <h2>Daftar Mahasiswa</h2>
 <?php if (isset($_GET["status"]) && $_GET["status"] === "sukses"): ?>
 <p>Data berhasil ditambahkan.</p>
 <?php endif; ?>
 <table class="data-table">
 <thead>
 <tr>
 <th>No</th>
<th>NIM</th>
<th>Nama</th>
<th>Program Studi</th>
<th>Email</th>
 </tr>
 </thead>
 <tbody>
 <?php $no = 1; ?>
 <?php while ($row = $result->fetch_assoc()): ?>
 <tr>
 <td><?= $no++; ?></td>
<td><?= htmlspecialchars($row["nim"]); ?></td>
<td><?= htmlspecialchars($row["nama"]); ?></td>
<td><?= htmlspecialchars($row["program_studi"]); ?></td>
<td><?= htmlspecialchars($row["email"]); ?></td>
 </tr>
 <?php endwhile; ?>
 </tbody>
 </table>
 </section>
 </main>
<footer>
 <p>Web Programming 1</p>
</footer>
</body>
</html>
<?php
$conn->close();
?>
