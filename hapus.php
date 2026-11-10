<?php
require_once __DIR__ . "/../../config/auth.php";
require_once __DIR__ . "/../../config/koneksi.php";
require_once __DIR__ . "/../../config/media_helper.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../../crud-media/index.php");
    exit;
}

$id = (int)($_POST["id"] ?? 0);
if ($id <= 0) {
    die("ID tidak valid.");
}

// 1. Ambil referensi nama file dari DB sebelum record dihapus
$stmtSelect = $conn->prepare("SELECT foto, audio, dokumen FROM mahasiswa WHERE id = ? LIMIT 1");
$stmtSelect->bind_param("i", $id);
$stmtSelect->execute();
$data = $stmtSelect->get_result()->fetch_assoc();
$stmtSelect->close();

if (!$data) {
    die("Data tidak ditemukan.");
}

// 2. Hapus row data dari database MySQL
$stmtDelete = $conn->prepare("DELETE FROM mahasiswa WHERE id = ?");
$stmtDelete->bind_param("i", $id);

if (!$stmtDelete->execute()) {
    die("Data gagal dihapus dari database.");
}
$stmtDelete->close();
$conn->close();

// 3. Cleanup / Hapus file fisik dari folder uploads
$rootUpload = __DIR__ . "/../../uploads";
hapusMediaJikaAda($data["foto"], $rootUpload . "/images");
hapusMediaJikaAda($data["audio"], $rootUpload . "/audio");
hapusMediaJikaAda($data["dokumen"], $rootUpload . "/documents");

header("Location: ../../crud-media/index.php?status=hapus");
exit;