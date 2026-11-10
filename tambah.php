<?php
// Aktifkan laporan error agar layar tidak putih polos
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Cek file auth
if (file_exists(__DIR__ . "/../../config/auth.php")) {
    require_once __DIR__ . "/../../config/auth.php";
}

// Cek keberadaan file koneksi dan media_helper
if (!file_exists(__DIR__ . "/../../config/koneksi.php")) {
    die("Error: File config/koneksi.php tidak ditemukan!");
}
if (!file_exists(__DIR__ . "/../../config/media_helper.php")) {
    die("Error: File config/media_helper.php tidak ditemukan!");
}

require_once __DIR__ . "/../../config/koneksi.php";
require_once __DIR__ . "/../../config/media_helper.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../../crud-media/tambah.php");
    exit;
}

$nim           = trim($_POST["nim"] ?? "");
$nama          = trim($_POST["nama"] ?? "");
$program_studi = trim($_POST["program_studi"] ?? "");
$email         = trim($_POST["email"] ?? "");

if ($nim === "" || $nama === "" || $program_studi === "" || $email === "") {
    die("Semua field teks wajib diisi.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Format email tidak valid.");
}

$rootUpload  = __DIR__ . "/../../uploads";
$imageDir    = $rootUpload . "/images";
$audioDir    = $rootUpload . "/audio";
$documentDir = $rootUpload . "/documents";

// Buat folder jika belum ada
if (!is_dir($imageDir)) mkdir($imageDir, 0775, true);
if (!is_dir($audioDir)) mkdir($audioDir, 0775, true);
if (!is_dir($documentDir)) mkdir($documentDir, 0775, true);

$allowedImage = [
    "image/jpeg" => "jpg",
    "image/png"  => "png",
    "image/webp" => "webp"
];

$allowedAudio = [
    "audio/mpeg"     => "mp3",
    "audio/wav"      => "wav",
    "audio/x-wav"    => "wav",
    "audio/wave"     => "wav",
    "audio/vnd.wave" => "wav",
    "audio/x-pn-wav" => "wav"
];

$allowedDocument = [
    "application/pdf" => "pdf"
];

$maxSize = 2 * 1024 * 1024; // 2 MB

$foto    = null;
$audio   = null;
$dokumen = null;

try {
    // Process upload foto (Wajib)
    $foto = uploadMedia(
        $_FILES["foto"] ?? [],
        $allowedImage,
        $maxSize,
        $imageDir,
        "img"
    );

    if ($foto === null) {
        throw new RuntimeException("Foto wajib dipilih.");
    }

    // Process upload audio (Optional)
    $audio = uploadMedia(
        $_FILES["audio"] ?? [],
        $allowedAudio,
        $maxSize,
        $audioDir,
        "aud"
    );

    // Process upload dokumen (Optional)
    $dokumen = uploadMedia(
        $_FILES["dokumen"] ?? [],
        $allowedDocument,
        $maxSize,
        $documentDir,
        "doc"
    );

    // Query simpan ke database
    $stmt = $conn->prepare(
        "INSERT INTO mahasiswa (nim, nama, program_studi, email, foto, audio, dokumen) 
         VALUES (?, ?, ?, ?, ?, ?, ?)"
    );

    if (!$stmt) {
        throw new RuntimeException("Query prepare gagal: " . $conn->error);
    }

    $stmt->bind_param(
        "sssssss",
        $nim,
        $nama,
        $program_studi,
        $email,
        $foto,
        $audio,
        $dokumen
    );

    if (!$stmt->execute()) {
        throw new RuntimeException("Data gagal disimpan ke database: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();

    header("Location: ../../crud-media/index.php?status=tambah");
    exit;

} catch (Exception $e) {
    hapusMediaJikaAda($foto, $imageDir);
    hapusMediaJikaAda($audio, $audioDir);
    hapusMediaJikaAda($dokumen, $documentDir);

    die("<h2 style='color:red;'>Proses Gagal / Error:</h2> " . htmlspecialchars($e->getMessage()));
}