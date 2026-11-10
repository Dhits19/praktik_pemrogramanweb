<?php
function uploadMedia(
    array $file,
    array $allowedMime,
    int $maxSize,
    string $targetDir,
    string $prefix
): ?string {
    if (!isset($file["error"]) || is_array($file["error"])) {
        throw new RuntimeException("Format data upload tidak valid.");
    }
    if ($file["error"] === UPLOAD_ERR_NO_FILE) {
        return null;
    }
    if ($file["error"] !== UPLOAD_ERR_OK) {
        throw new RuntimeException(
            "Upload gagal. Kode error: " . $file["error"]
        );
    }
    if ($file["size"] > $maxSize) {
        throw new RuntimeException("Ukuran file terlalu besar.");
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($file["tmp_name"]);
    if (!isset($allowedMime[$mime])) {
        throw new RuntimeException("Tipe file tidak diizinkan.");
    }

    if (!is_dir($targetDir)) {
        if (!mkdir($targetDir, 0775, true)) {
            throw new RuntimeException("Folder upload gagal dibuat.");
        }
    }

    $extension = $allowedMime[$mime];
    $filename = $prefix . "_" . bin2hex(random_bytes(8)) . "." . $extension;
    $destination =
        rtrim($targetDir, DIRECTORY_SEPARATOR)
        . DIRECTORY_SEPARATOR
        . $filename;

    if (!move_uploaded_file($file["tmp_name"], $destination)) {
        throw new RuntimeException("File gagal dipindahkan ke folder upload.");
    }

    return $filename;
}

function hapusMediaJikaAda(?string $filename, string $targetDir): void {
    if (!$filename) {
        return;
    }
    $safeName = basename($filename);
    $path =
        rtrim($targetDir, DIRECTORY_SEPARATOR)
        . DIRECTORY_SEPARATOR
        . $safeName;

    if (is_file($path)) {
        unlink($path);
    }
}