<?php
require_once "../config/auth.php";
require_once "../config/koneksi.php";
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../crud/tambah.php");
    exit;
}
$nim = trim($_POST["nim"] ?? "");
$nama = trim($_POST["nama"] ?? "");
$program_studi = trim($_POST["program_studi"] ?? "");
$email = trim($_POST["email"] ?? "");
if ($nim === "" || $nama === "" || $program_studi === "" || $email === "") {
    die("Semua field wajib diisi.");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Format email tidak valid.");
}
$stmt = $conn->prepare(
    "INSERT INTO mahasiswa (nim, nama, program_studi, email)
 VALUES (?, ?, ?, ?)"
);
$stmt->bind_param("ssss", $nim, $nama, $program_studi, $email);
$stmt->execute();
$stmt->close();
$conn->close();
header("Location: ../crud/index.php?status=tambah");
exit;
?>