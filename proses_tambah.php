<nav>
 <a href="dashboard.php">Dashboard</a>
 <a href="index.php">Home / Biodata</a>
 <a href="layout.php">Layout Lab</a>
 <a href="data_mahasiswa.php">Data Mahasiswa</a>
 <a href="form_mahasiswa.php">Tambah Mahasiswa</a>
  <a href="../proses/logout.php">Logout</a>
</nav>


proses_tambah.php (bagian paling atas)
<?php
require_once("../config/auth.php");
require_once "../config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
 header("Location: ../pages/form_mahasiswa.php");
 exit;
}
$nim = trim($_POST["nim"] ?? "");
$nama = trim($_POST["nama"] ?? "");
$program_studi = trim($_POST["program_studi"] ?? "");
$email = trim($_POST["email"] ?? "");
if (
 $nim === "" ||
 $nama === "" ||
 $program_studi === "" ||
 $email === ""
) {
 die("Semua field wajib diisi.");
}
$stmt = $conn->prepare(
 "INSERT INTO mahasiswa
 (nim, nama, program_studi, email)
 VALUES (?, ?, ?, ?)"
);
$stmt->bind_param(
 "ssss",
 $nim,
 $nama,
 $program_studi,
 $email
);
$stmt->execute();
$stmt->close();
$conn->close();
header("Location: ../pages/data_mahasiswa.php?status=sukses");
exit;
?>