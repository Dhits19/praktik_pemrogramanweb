<?php
require_once "../config/auth.php";
require_once "../config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../crud/index.php");
    exit;
}

$id = (int) ($_POST["id"] ?? 0);
$nim = trim($_POST["nim"] ?? "");
$nama = trim($_POST["nama"] ?? "");
$program_studi = trim($_POST["program_studi"] ?? "");
$email = trim($_POST["email"] ?? "");

if ($id <= 0 || $nim === "" || $nama === "" ||
    $program_studi === "" || $email === "") {
    die("Data update tidak valid.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Format email tidak valid.");
}

$stmt = $conn->prepare(
    "UPDATE mahasiswa
     SET nim = ?, nama = ?, program_studi = ?, email = ?
     WHERE id = ?"
);

if (!$stmt) {
    die("Query gagal: " . $conn->error);
}

$stmt->bind_param("ssssi", $nim, $nama, $program_studi, $email, $id);

if (!$stmt->execute()) {
    die("Update gagal: " . $stmt->error);
}

$stmt->close();
$conn->close();

header("Location: ../crud/index.php?status=update");
exit;
?>
